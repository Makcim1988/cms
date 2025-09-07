<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Member;
use App\Models\Article;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function editMember()
    {
        $articles = Article::all();
        $member = Member::where('id', auth()->id())->first();
        return view('member-edit-profile', ['title' => 'CMS Страница пользователя' . $member->forenme . ' ' . $member->surname, 'desc' => 'CMS Страница пользователя' . $member->forenme . ' ' . $member->surname, 'member' => $member, 'articles' => $articles]);
    }

    public function storeMemberAfterEdit(Request $request)
    {
        $validated = $request->validate([
            'forename' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required',
        ]);

        $member = Member::find(auth()->id());

        if (!$member) {
            return redirect()->route('login')->withErrors(['Пользователь не найден']);
        }

        //dd($request->all());
        //dd($request->file('image'));

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('uploads', $filename, 'public');

            // Удаляем старую картинку, если есть
            if ($member->picture) {
                \Storage::disk('public')->delete('uploads/' . $member->picture);
            }

            $member->picture = $filename;
        }

        $member->forename = $request->forename;
        $member->surname = $request->surname;
        $member->email = $request->email;

        $member->save();

        return redirect()->route('articles.index');
    }

    public function getMembers()
    {

        $members = Member::get();
        $articles = Article::get();

        return view('admin-members-edit', ['title' => 'CMS Страница редактирования пользователей', 'desc' => 'CMS Страница редактирования пользователей', 'members' => $members, 'articles' => $articles]);
    }

    public function getMember($id)
    {

        $member = Member::where('id', $id)->first();
        $articles = Article::get();

        return view('admin-edit-member', ['title' => 'CMS Страница редактирования пользователей', 'desc' => 'CMS Страница редактирования пользователей', 'member' => $member, 'articles' => $articles]);
    }

    public function storeMember(Request $request, $id)
    {

        $member = Member::findOrFail($id);

        $member->role = $request->role;
        $member->save();

        return redirect()->route('admin-members-show');

    }

    public function destroyMember($id) {
        $member = Member::findOrFail($id);
        $member->articles()->delete();
        $member->delete();
        return redirect()->route("admin-members-show");
    }
}
