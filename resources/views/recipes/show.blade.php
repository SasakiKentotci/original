@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <!-- <img src="{{ $recipe->image_url }}" alt="レシピ画像" class="w-full h-64 object-cover rounded mb-4"> -->
    <h2 class="font-semibold text-2xl font-bold mb-2">{{ $recipe->title }}</h2>

    <h3 class="font-semibold mb-2">材料</h3>
    <ul class="list-disc list-inside mb-4">
        @foreach($recipe->usings as $ingredient) 
        <li>{{ $ingredient->ingredient }} ({{ $ingredient->pivot->amount }})</li>
        @endforeach
    </ul>


    <ol class="list-decimal">
        @foreach(json_decode($recipe->content) as $content)
        <li class="text-sm text-gray-600">{{ Str::limit($content, 50) }}</li>
         @endforeach
    </ol>


    <p class="text-sm text-gray-500">作成者: {{ $recipe->user->name }}</p>
</div>
@endsection