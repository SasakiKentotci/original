@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2 class="text-lg">メッセージ新規作成ページ</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('category.store') }}" class="w-1/2">
            @csrf

                <div class="form-control my-4">
                    <label for="category" class="label">
                        <span class="label-text">食材:</span>
                    </label>
                    <input type="text" name="category" class="input input-bordered w-full">
                </div>

            <button type="submit" class="btn btn-primary btn-outline">追加</button>
        </form>
    </div>

@endsection