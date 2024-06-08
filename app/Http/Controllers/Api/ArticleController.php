<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;

class ArticleController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all Article
        $articles = Article::latest()->paginate(5);

        //return collection of Article as a resource
        return new ArticleResource(true, 'List Data Article', $articles);
    }
}