<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $article->thumbnail = Storage::url($path);
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
                Storage::disk('public')->delete(str_replace('/storage', '', $article->thumbnail));
            }

            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $article->thumbnail = Storage::url($path);
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
            $path = $file->store('uploads', 'public');
            $url = Storage::url($path);

            return response()->json([
                'url' => $url
            ]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
