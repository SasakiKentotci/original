@extends('layouts.app')

@section('content')
    <div class="sm:grid sm:grid-cols-3 sm:gap-10">
            {{-- 投稿一覧 --}}
            @include('recipes.recipes')
            
    </div>
    
@endsection