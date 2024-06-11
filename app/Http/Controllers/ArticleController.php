<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.superadmin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.superadmin.articles.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Max 2MB
        ]);

        $content = $this->addDomainToImageUrls($request->content);

        $article = new Article();
        $article->title = $request->title;
        $article->content = $content;

        if ($request->hasFile('thumbnail')) {
            $path = $this->saveImage($request->file('thumbnail'));
            $article->thumbnail = 'images/' . $path;
        }

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('admin.superadmin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.superadmin.articles.create_edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Max 2MB
        ]);

        $content = $this->addDomainToImageUrls($request->content);

        $article->title = $request->title;
        $article->content = $content;

        if ($request->hasFile('thumbnail')) {
            // Delete the old thumbnail if it exists
            if ($article->thumbnail) {
                $oldPath = public_path(str_replace('/storage', 'images', $article->thumbnail));
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $path = $this->saveImage($request->file('thumbnail'));
            $article->thumbnail = 'images/' . $path;
        }

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article updated successfully');
    }

    /**
     * Add domain to image URLs in the content.
     *
     * @param string $content
     * @return string
     */
    private function addDomainToImageUrls($content)
    {
        $domain = config('app.url'); // Use your application URL
        $pattern = '/(<img[^>]+src=["\'])(\/storage[^"\']+)(["\'][^>]*>)/i';
        $replacement = '$1' . $domain . '$2$3';

        return preg_replace($pattern, $replacement, $content);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully');
    }

    /**
     * Handle image upload from CKEditor.
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $path = $this->saveImage($file);
            $url = asset('images/' . $path);

            return response()->json([
                'url' => $url
            ]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

    /**
     * Save the image to the public/images directory.
     *
     * @param \Illuminate\Http\UploadedFile $image
     * @return string
     */
    private function saveImage($image)
    {
        $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $filename);
        return $filename;
    }
}
