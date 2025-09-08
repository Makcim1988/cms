<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginUser()
    {
         $articles = Article::with(['category', 'image', 'member'])->paginate(6);

        return view('login', ['title' => 'CMS | Login page', 'desc' => 'CMS | Login page', 'articles' => $articles]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Пытаемся авторизовать
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // защита от фиксации сессии
            return redirect()->intended('/'); // куда отправить после входа
        }

        return back()->withErrors([
            'email' => 'Incorrect login or password',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('articles.index');
    }
}
