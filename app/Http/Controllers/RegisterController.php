<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function createUser()
    {
        $articles = Article::with(['category', 'image', 'member'])->paginate(6);

        return view('register', ['title' => 'CMS | Registration page', 'desc' => 'CMS | Registration page', 'articles' => $articles]);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'forename'  => 'required',
            'surname'   => 'required',
            'email'     => 'required|unique:member',
            'password'  => 'required',
        ]);

        $member = Member::create([
            'forename' => $request->forename,
            'surname'  => $request->surname,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($member);

        return redirect()->route('articles.index');
    }
}
