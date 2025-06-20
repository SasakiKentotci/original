@extends('layouts.app')

@section('content')
    <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
        <div class="hero-content text-center my-10 flex flex-col align-start">
            @include('recipes.recipes_contents')
        </div>
    </div>
@endsection