@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2 class="text-lg">カテゴリー 一覧</h2>
    </div>

    @if (isset($category))
        <table class="table table-zebra w-full my-4">
            <thead>
                <tr>
                    <th>id</th>
                    <th>食材</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $category)
                <tr>
                    <td><a class="link link-hover text-info" href="{{ route('category.show',$category->id) }}">{{ $category->id }}</a></td>
                    <td>{{ $category->category }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <a class="btn btn-primary" href="{{ route('category.create') }}">新規カテゴリーを追加</a> 


@endsection