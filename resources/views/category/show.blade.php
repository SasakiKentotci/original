@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>id = {{ $category->id }} のメッセージ詳細ページ</h2>
    </div>

    <table class="table w-full my-4">
        <tr>
            <th>id</th>
            <td>{{ $category->id }}</td>
        </tr>

        <tr>
            <th>メッセージ</th>
            <td>{{ $category->category }}</td>
        </tr>
    </table>
        {{-- メッセージ編集ページへのリンク --}}
    <a class="btn btn-outline" href="{{ route('category.edit', $category->id) }}">このメッセージを編集</a>
    
    {{-- メッセージ削除フォーム --}}
    <form method="POST" action="{{ route('category.destroy', $category->id) }}" class="my-2">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-error btn-outline" 
            onclick="return confirm('id = {{ $category->id }} のメッセージを削除します。よろしいですか？')">削除</button>
    </form>
    
@endsection