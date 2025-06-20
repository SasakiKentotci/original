<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $recipes = Recipes::all();
        $data = [
            'recipes' => $recipes,
            ];
        // dashboardビューでそれらを表示
        return view('dashboard', $data);
    }



    public function create()
    {
        $recipe = new Recipes();

        // メッセージ作成ビューを表示
        return view('recipes.create', [
            'recipe' => $recipe,
        ]);
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);
        
        // 認証済みユーザー（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->recipess()->create([
            'content' => $request->content,
        ]);
        
        // 前のURLへリダイレクトさせる
        return back();
    }

    public function show(string $id)
    {
        // idの値でメッセージを検索して取得
        $recipe = Recipes::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('recipes.show', [
            'recipe' => $recipe,
        ]);
    }
    public function destroy(string $id)
    {
        // idの値で投稿を検索して取得
        $recipes = Recipes::findOrFail($id);
        
        // 認証済みユーザー（閲覧者）がその投稿の所有者である場合は投稿を削除
        if (\Auth::id() === $recipes->user_id) {
            $recipes->delete();
            return back()
                ->with('success','Delete Successful');
        }

        // 前のURLへリダイレクトさせる
        return back()
            ->with('Delete Failed');
    }
}
