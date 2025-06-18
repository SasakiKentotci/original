@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <img src="{{ $recipe->image_url }}" alt="レシピ画像" class="w-full h-64 object-cover rounded mb-4">
    <h2 class="text-2xl font-bold mb-2">{{ $recipe->title }}</h2>
    <p class="mb-4 text-gray-700">{{ $recipe->description }}</p>

    <h3 class="font-semibold mb-2">材料</h3>
    <ul class="list-disc list-inside mb-4">
        @foreach ($recipe->ingredients as $ingredient)
        <li>{{ $ingredient->name }}</li>
        @endforeach
    </ul>

    <p class="text-sm text-gray-500">作成者: {{ $recipe->user->name }}</p>
</div>
@endsection