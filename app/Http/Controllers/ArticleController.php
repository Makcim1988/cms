<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Member;
use App\Models\Image;

class ArticleController extends Controller
{
    public function index()
    {
        //$articles = Article::with(['category', 'image', 'member'])->paginate(6);
        
        $articles = Article::where('published', 1)->orderByDesc('id')->paginate(6);

        return view('index', ['title' => 'CMS Home page', 'desc' => 'CMS Home page', 'articles' => $articles]);
    }

    public function show($id)
    {
    
        $articleData = Article::where('id', $id)->first();
        //$articles = Article::with(['category', 'image', 'member'])->paginate(6);
        $articles = Article::where('published', 1)->orderByDesc('id')->paginate(6);

        return view('show', ['title' => $articleData->title, 'desc' => $articleData->title, 'articleData' => $articleData, 'articles' => $articles]);
    }

    public function showCategory($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        $articles = Article::where('category_id', $category->id)->orderByDesc('id')->paginate(6);

        return view('show-category', ['title' => $category->name, 'desc' => $category->name,  'articles' => $articles, 'category' => $category]);
    }

    public function showMember($id)
    {
        $member = Member::where('id', $id)->firstOrFail();
        $articles = Article::where('member_id', $member->id)->orderByDesc('id')->paginate(6);

        return view('show-member', ['title' => $member->forename . ' ' . $member->surename, 'desc' => $member->forename . ' ' . $member->surename,  'articles' => $articles, 'member' => $member]);
    }

    public function search(Request $request)
    {
        $articles = Article::with(['category', 'image', 'member'])->orderByDesc('id')->get();
        $term = $request->query('term');
        $result = null;

        if($term) {
            $result = Article::where('title', 'like', "%{$term}%")
                        ->orWhere('summary', 'like', "%{$term}%")
                        ->orWhere('content', 'like', "%{$term}%")->get();
        }

        return view('search', ['title' => 'CMS | Search page', 'desc' => 'CMS | Search page', 'articles' => $articles, 'term' => $term, 'result' => $result]);
    }

    public function getAdminCategories()
    {
        $categories = Category::all();

        return view('admin-categories', ['categories' => $categories, 'title' => 'CMS | Admin page | Categories', 'desc' => 'CMS | Admin page | Categories']);
    }

    public function createAdminCategory()
    {
        return view('admin-add-category', ['title' => 'CMS | Admin page | Category', 'desc' => 'CMS | Admin page | Category']);
    }

    public function editAdminCategory($id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin-edit-category', ['title' => 'CMS | Admin page | Category edit', 'desc' => 'CMS | Admin page | Category edit', 'category' => $category]);
    }

    public function storeAdminCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:category|max:255',
            'description' => 'required',
        ]);

        if ($request->has("id")) { 
            $cat = Category::findOrFail($request->id); 
            $cat->fill($request->all())->save(); 
        } else { 
            Category::create($request->all()); 
        }

        return redirect('/admin/categories');
    }

    public function destroyAdminCategory($id) { 
        Category::destroy($id); 
        return redirect()->route("articles.admin-categories"); 
    } 

    public function getAdminArticles()
    {
        $articles = Article::all();

        return view('admin-articles', ['articles' => $articles, 'title' => 'CMS | Admin page | Articles', 'desc' => 'CMS | Admin page | Articles']);
    }

    public function createAdminArticle()
    {
        $articles = Article::with(['category', 'image', 'member'])->orderByDesc('id')->get();
        $members = Member::get();
        $categories = Category::get();

        return view('admin-add-article', ['title' => 'CMS | Admin page | Articles create', 'desc' => 'CMS | Admin page | Articles create', 'articles' => $articles, 'members' => $members, 'categories' => $categories]);
    }

    public function storeAdminArticle(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required',
            'image_alt' => 'required',
            'title' => 'required|unique:article|max:255',
            'summary' => 'required',
            'content' => 'required',
            'member_id' => 'required',
            'category_id' => 'required',
            'published' => 'required',
        ]);

        $article = new Article(); 
        $member = new Member(); 
        $category = new Category(); 
        $image = new Image();

        $filename = time() . '.' . $request->file('image')->extension();

        // Сохраняем в storage/app/public/upload
        $request->file('image')->storeAs('uploads', $filename, 'public');
        $request->file('image')->move(public_path('storage/uploads'), $filename);

        // Создаём запись о картинке
        $image = new Image();
        $image->file = $filename; // ← сохраняем имя файла, а не объект
        $image->alt  = $request->image_alt;
        $image->save();

        $article->title = $request->title;
        $article->summary = $request->summary;
        $article->content = $request->content;
        $article->member_id = $request->member_id;
        $article->category_id = $request->category_id;
        $article->published = $request->published;
        $article->image_id = $image->id;
        $article->save();

        return redirect()->route("articles.admin-articles");
    }

    public function editAdminArticle($id)
    {
        $article = Article::where('id', $id)->first();
        $members = Member::get();
        $categories = Category::get();

        return view('admin-edit-article', ['title' => 'CMS | Admin page | Articles edit', 'desc' => 'CMS | Admin page | Articles edit', 'article' => $article, 'members' => $members, 'categories' => $categories]);
    }

    public function storeAdminArticleAfterEdit(Request $request)
    {
        $id = $request->id;

        $validated = $request->validate([
            'image'       => 'nullable|file|image|',
            'image_alt'   => 'required',
            'title'       => 'required|max:255|unique:article,title,' . $id,
            'summary'     => 'required',
            'content'     => 'required',
            'member_id'   => 'required',
            'category_id' => 'required',
            'published'   => 'required',
        ]);

        $article = Article::findOrFail($id);
        
        if ($request->hasFile('image')) {
            if ($article->image && $article->image->file) {
                \Storage::disk('public')->delete('uploads/' . $article->image->file);
            }

            $filename = time() . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('uploads', $filename, 'public');
            $request->file('image')->move(public_path('storage/uploads'), $filename);

            if ($article->image) {
                $article->image->file = $filename;
                $article->image->alt  = $request->image_alt;
                $article->image->save();
            } else {
                $image = new Image();
                $image->file = $filename;
                $image->alt  = $request->image_alt;
                $image->save();
                $article->image_id = $image->id;
            }
        } elseif ($article->image) {
            $article->image->alt = $request->image_alt;
            $article->image->save();
        }

        $article->fill($request->only([
            'title', 'summary', 'content', 'member_id', 'category_id', 'published'
        ]));

        $article->save();

        return redirect()->route("articles.admin-articles");
    }

    public function destroyAdminArticle($id) { 
        Article::destroy($id); 
        return redirect()->route("articles.admin-articles"); 
    } 






    public function getMemberArticles()
    {
        $articles = Article::where('member_id', auth()->id())->get();

        return view('member-articles', ['articles' => $articles, 'title' => 'CMS | User page | Articles', 'desc' => 'CMS | User page | Articles']);
    }

    public function createMemberArticle()
    {
        $articles = Article::with(['category', 'image', 'member'])->get();
        $member = Member::where('id', auth()->id())->first();
        $categories = Category::get();

        return view('member-add-article', ['title' => 'CMS | User page | Articles create', 'desc' => 'CMS | User page | Articles create', 'articles' => $articles, 'member' => $member, 'categories' => $categories]);
    }

    public function storeMemberArticle(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required',
            'image_alt' => 'required',
            'title' => 'required|unique:article|max:255',
            'summary' => 'required',
            'content' => 'required',
            'member_id' => 'required',
            'category_id' => 'required',
            'published' => 'required',
        ]);

        $article = new Article(); 
        $member = new Member(); 
        $category = new Category(); 
        $image = new Image();

        $filename = time() . '.' . $request->file('image')->extension();

        // Сохраняем в storage/app/public/upload
        $request->file('image')->storeAs('uploads', $filename, 'public');
        $request->file('image')->move(public_path('storage/uploads'), $filename);

        // Создаём запись о картинке
        $image = new Image();
        $image->file = $filename; // ← сохраняем имя файла, а не объект
        $image->alt  = $request->image_alt;
        $image->save();

        $article->title = $request->title;
        $article->summary = $request->summary;
        $article->content = $request->content;
        $article->member_id = $request->member_id;
        $article->category_id = $request->category_id;
        $article->published = $request->published;
        $article->image_id = $image->id;
        $article->save();

        return redirect()->route("articles.member-articles");
    }

    public function editMemberArticle($id)
    {
        $article = Article::where('id', $id)->first();
        $member = Member::where('id', auth()->id())->first();;
        $categories = Category::get();

        return view('member-edit-article', ['title' => 'CMS | User page | Articles edit', 'desc' => 'CMS | User page | Articles edit', 'article' => $article, 'member' => $member, 'categories' => $categories]);
    }

    public function storeMemberArticleAfterEdit(Request $request)
    {
        $id = $request->id;

        $validated = $request->validate([
            'image'       => 'nullable|file|image|',
            'image_alt'   => 'required',
            'title'       => 'required|max:255|unique:article,title,' . $id,
            'summary'     => 'required',
            'content'     => 'required',
            'member_id'   => 'required',
            'category_id' => 'required',
            'published'   => 'required',
        ]);

        $article = Article::findOrFail($id);

        // Если загружена новая картинка
        if ($request->hasFile('image')) {
            if ($article->image && $article->image->file) {
                \Storage::disk('public')->delete('uploads/' . $article->image->file);
            }

            $filename = time() . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('uploads', $filename, 'public');
            $request->file('image')->move(public_path('storage/uploads'), $filename);

            if ($article->image) {
                $article->image->file = $filename;
                $article->image->alt  = $request->image_alt;
                $article->image->save();
            } else {
                $image = new Image();
                $image->file = $filename;
                $image->alt  = $request->image_alt;
                $image->save();
                $article->image_id = $image->id;
            }
        } elseif ($article->image) {
            $article->image->alt = $request->image_alt;
            $article->image->save();
        }

        $article->fill($request->only([
            'title', 'summary', 'content', 'member_id', 'category_id', 'published'
        ]));

        $article->save();

        return redirect()->route("articles.member-articles");
    }

    public function destroyMemberArticle($id) { 
        Article::destroy($id); 
        return redirect()->route("articles.member-articles"); 
    } 
}
