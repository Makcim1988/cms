<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index() 
    {
        $articles = Article::with(['category', 'image', 'member'])->paginate(6);
        //$categories = Category::all();

        return view('index', ['title' => 'CMS Главная страница', 'desc' => 'CMS Главная страница', 'articles' => $articles]);
    }

    public function show($article) 
    {
        $articleData = Article::where('title', $article)->first();
        $articles = Article::with(['category', 'image', 'member'])->paginate(6);
        //$categories = Category::all();

        return view('show', ['title' => $articleData->title, 'desc' => $articleData->title, 'articleData' => $articleData, 'articles' => $articles]);
    }
}
