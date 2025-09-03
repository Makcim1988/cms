<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Member;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category', 'image', 'member'])->paginate(6);

        return view('index', ['title' => 'CMS Главная страница', 'desc' => 'CMS Главная страница', 'articles' => $articles]);
    }

    public function show($article)
    {
        $articleData = Article::where('title', $article)->first();
        $articles = Article::with(['category', 'image', 'member'])->paginate(6);

        return view('show', ['title' => $articleData->title, 'desc' => $articleData->title, 'articleData' => $articleData, 'articles' => $articles]);
    }

    public function showCategory($categoryName)
    {
        $category = Category::where('name', $categoryName)->firstOrFail();
        $articles = Article::where('category_id', $category->id)->paginate(6);

        return view('show-category', ['title' => $category->name, 'desc' => $category->name,  'articles' => $articles, 'category' => $category]);
    }

    public function showMember($id)
    {
        $member = Member::where('id', $id)->firstOrFail();
        $articles = Article::where('member_id', $member->id)->paginate(6);

        return view('show-member', ['title' => $member->forename . ' ' . $member->surename, 'desc' => $member->forename . ' ' . $member->surename,  'articles' => $articles, 'member' => $member]);
    }
}
