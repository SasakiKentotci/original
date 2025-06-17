@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2 class="text-lg">id: {{ $category->id }} のメッセージ編集ページ</h2>
    </div>

    <div class="flex justify-center">
        <form method="POST" action="{{ route('category.update', $category->id) }}" class="w-1/2">
            @csrf
            @method('PUT')

                <div class="form-control my-4">
                    <label for="category" class="label">
                        <span class="label-text">食材:</span>
                    </label>
                    <input type="text" name="category" value="{{ $category->content }}" class="input input-bordered w-full">
                </div>

            <button type="submit" class="btn btn-primary btn-outline">更新</button>
        </form>
    </div>

@endsection