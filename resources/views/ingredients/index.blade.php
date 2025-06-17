@extends('layouts.app')

@section('content')

    <div class="prose ml-4">
        <h2 class="text-lg">食材 一覧</h2>
    </div>

    @if (isset($ingredients))
        <table class="table table-zebra w-full my-4">
            <thead>
                <tr>
                    <th>id</th>
                    <th>食材</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingredients as $ingredient)
                <tr>
                    <td><a class="link link-hover text-info" href="{{ route('ingredients.show',$ingredient->id) }}">{{ $ingredient->id }}</a></td>
                    <td>{{ $ingredient->ingredient }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <a class="btn btn-primary" href="{{ route('ingredients.create') }}">新規食材を追加</a> 


@endsection