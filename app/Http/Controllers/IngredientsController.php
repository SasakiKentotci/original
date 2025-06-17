<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use Illuminate\Http\Request;


class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingredients=Ingredients::all();
        
        return view("ingredients.index",["ingredients"=>$ingredients],); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ingredients = new Ingredients;

        // メッセージ作成ビューを表示
        return view('ingredients.create', [
            'ingredients' => $ingredients,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // メッセージを作成
        $ingredients = new Ingredients;
        $ingredients->ingredient = $request->ingredient;
        $ingredients->save();

        // トップページへリダイレクトさせる
        return redirect('/ingredients');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
                // idの値でメッセージを検索して取得
        $ingredients = Ingredients::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('ingredients.show', [
            'ingredients' => $ingredients,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // idの値でメッセージを検索して取得
        $ingredients = Ingredients::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('ingredients.edit', [
            'ingredients' => $ingredients,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ingredients = Ingredients::findOrFail($id);
   
        $ingredients->ingredient = $request->ingredient;
        $ingredients->save();

        // トップページへリダイレクトさせる
        return redirect('/ingredients');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ingredients= Ingredients::findOrFail($id);

        $ingredients->delete();

        // トップページへリダイレクトさせる
        return redirect('/ingredients');
    }
}
