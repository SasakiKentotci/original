<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {     
        // ユーザー一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);

        // ユーザー一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users
        ]);

    }
    
    public function show(string $id)
    {
                // idの値でユーザーを検索して取得
        $user = User::findOrFail($id);
        
        
        // ユーザーの投稿一覧を作成日時の降順で取得
        $recipes = $user->recipes()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザー詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'recipes' => $recipes
        ]);
    }
}