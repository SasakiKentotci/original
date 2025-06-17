<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=Category::all();
        
        return view("category.index",["category"=>$category],); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category;

        // メッセージ作成ビューを表示
        return view('category.create', [
            'category' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // メッセージを作成
        $category = new Category;
        $category->category = $request->category;
        $category->save();

        // トップページへリダイレクトさせる
        return redirect('/category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
                // idの値でメッセージを検索して取得
        $category = category::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('category.show', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // idの値でメッセージを検索して取得
        $category = Category::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
   
        $category->category = $request->category;
        $category->save();

        // トップページへリダイレクトさせる
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category= Category::findOrFail($id);

        $category->delete();

        // トップページへリダイレクトさせる
        return redirect('/category');
    }
}
