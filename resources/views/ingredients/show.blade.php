@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2>id = {{ $ingredients->id }} の詳細ページ</h2>
    </div>

    <table class="table w-full my-4">
        <tr>
            <th>id</th>
            <td>{{ $ingredients->id }}</td>
        </tr>

        <tr>
            <th>メッセージ</th>
            <td>{{ $ingredients->ingredient }}</td>
        </tr>
    </table>
        {{-- メッセージ編集ページへのリンク --}}
    <a class="btn btn-outline" href="{{ route('ingredients.edit', $ingredients->id) }}">このメッセージを編集</a>
    
    {{-- メッセージ削除フォーム --}}
    <form method="POST" action="{{ route('ingredients.destroy', $ingredients->id) }}" class="my-2">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-error btn-outline" 
            onclick="return confirm('id = {{ $ingredients->id }} のメッセージを削除します。よろしいですか？')">削除</button>
    </form>
    
@endsection