<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use App\Models\Recipes;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function index()
    {
        $data = [];
        $recipes = Recipes::all();
        $data = [
            'recipes' => $recipes,
            ];
        
        // dashboardビューでそれらを表示
        return view('recipes.index', $data);
    }



        public function create()
    {
        $recipe = new Recipes();
        $ingredients = Ingredients::all();

        // メッセージ作成ビューを表示
        return view('recipes.create', [
            'recipe' => $recipe,
            'ingredients' => $ingredients
        ]);
    }

        public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
        ]);
      
        // 認証済みユーザー（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $recipe = $request->user()->recipes()->create([
            "title"=>$request->title,
            'content' => json_encode($request->content),
        ]);

        foreach ($request->ingredientIds as $i => $ingredientId) {
            $recipe->usings()->attach($ingredientId, [ "amount" => $request->ingredientAmounts[$i] ]);
        }
        
        // 前のURLへリダイレクトさせる
        return redirect('/recipes');
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
        if (\Auth::id() === $recipes->user_id ||(\Auth::user()->name === "admin" && \Auth::user()->id===3)) {
            $recipes->delete();
            return back()
                ->with('success','Delete Successful');
        }

        // 前のURLへリダイレクトさせる
        return back()
            ->with('Delete Failed');
    }
}
