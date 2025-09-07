<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/categories/{categoryName}', [ArticleController::class, 'showCategory'])->name('articles.showCategory');
Route::get('/members/{id}', [ArticleController::class, 'showMember'])->name('articles.showMember');
Route::get('/search', [ArticleController::class, 'search'])->name('articles.search');

Route::get('/admin/categories', [ArticleController::class, 'getAdminCategories'])->name('articles.admin-categories');

Route::get('/admin/categories/create', [ArticleController::class, 'createAdminCategory'])->name('articles.create-categories');
Route::post("/admin/categories", [ArticleController::class, 'storeAdminCategory'])->name('articles.store-categories');

Route::get("/admin/categories/{id}/edit", [ArticleController::class, 'editAdminCategory'])->name('articles.edit-categories');
Route::put("/admin/categories", [ArticleController::class, 'storeAdminCategory'])->name('articles.store-categories');

Route::get("/admin/categories/{id}/delete", [ArticleController::class, 'destroyAdminCategory'])->name('articles.destroy-categories');


Route::get('/admin/articles', [ArticleController::class, 'getAdminArticles'])->name('articles.admin-articles');

Route::get('/admin/articles/create', [ArticleController::class, 'createAdminArticle'])->name('articles.create-articles');
Route::post("/admin/articles", [ArticleController::class, 'storeAdminArticle'])->name('articles.store-articles');

Route::get("/admin/articles/{id}/edit", [ArticleController::class, 'editAdminArticle'])->name('articles.edit-articles');
Route::put("/admin/articles", [ArticleController::class, 'storeAdminArticleAfterEdit'])->name('articles.store-articles-after-edit');

Route::get("/admin/articles/{id}/delete", [ArticleController::class, 'destroyAdminArticle'])->name('articles.destroy-articles');

Route::get('/admin/articles', [ArticleController::class, 'getAdminArticles'])->name('articles.admin-articles');

Route::get('/register', [RegisterController::class, 'createUser'])->name('register');
Route::post("/register", [RegisterController::class, 'register'])->name('register.store');

Route::get('/login', [LoginController::class, 'loginUser'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/admin/members', [ArticleController::class, 'getAdminMembers'])->name('articles.admin-members');




Route::get('/member/articles', [ArticleController::class, 'getMemberArticles'])->name('articles.member-articles');

Route::get('/member/articles/create', [ArticleController::class, 'createMemberArticle'])->name('articles.create-articles');
Route::post("/member/articles", [ArticleController::class, 'storeMemberArticle'])->name('articles.store-member-articles');

Route::get("/member/articles/{id}/edit", [ArticleController::class, 'editMemberArticle'])->name('articles.member-edit-articles');
Route::put("/member/articles", [ArticleController::class, 'storeMemberArticleAfterEdit'])->name('articles.store-member-articles-after-edit');

Route::get("/member/articles/{id}/delete", [ArticleController::class, 'destroyMemberArticle'])->name('articles.member-destroy-articles');

Route::get('/member/articles', [ArticleController::class, 'getMemberArticles'])->name('articles.member-articles');


Route::get('/member/page/edit', [MemberController::class, 'editMember'])->name('member-edit');
Route::put("/member/page", [MemberController::class, 'storeMemberAfterEdit'])->name('member.store-after-edit');

Route::get("/admin/members", [MemberController::class, 'getMembers'])->name('admin-members-show');

Route::get("/admin/member/{id}/edit", [MemberController::class, 'getMember'])->name('admin-member-show');
Route::put("/admin/members/{id}", [MemberController::class, 'storeMember'])->name('member-store');

Route::get("admin/member/{id}/delete", [MemberController::class, 'destroyMember'])->name('member-destroy');
