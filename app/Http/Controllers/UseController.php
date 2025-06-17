<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UseController extends Controller
{
        public function store(string $id)
    {
        \Auth::recipe()->use(intval($id));
        // 前のURLへリダイレクトさせる
        return back();
    }

    public function destroy(string $id)
    {
        \Auth::recipe()->unuse(intval($id));
        // 前のURLへリダイレクトさせる
        return back();
    }
}
