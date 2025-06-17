@extends('layouts.app')

@section('content')
    <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
        <div class="hero-content text-center my-10">
            <div class="max-w-md mb-10">
                {{-- ユーザー登録ページへのリンク --}}
                <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">Sign up now!</a>
            </div>
            <div class="sm:col-span-2">
                {{-- 投稿一覧 --}}
                @include('recipes.recipes')
            </div>
        </div>
    </div>
@endsection