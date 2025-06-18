@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-semibold mb-4">レシピ一覧</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($recipes as $recipe)
    <a href="{{ route('recipes.show', $recipe->id) }}" class="bg-white p-4 rounded shadow hover:shadow-lg transition">
        <img src="{{ $recipe->image_url }}" alt="レシピ画像" class="w-full h-40 object-cover rounded mb-2">
        <h3 class="text-lg font-bold">{{ $recipe->title }}</h3>
        <p class="text-sm text-gray-600">{{ Str::limit($recipe->description, 50) }}</p>
        <div class="text-xs text-gray-500 mt-2">カテゴリ: {{ $recipe->category->name ?? '未分類' }}</div>
    </a>
    @endforeach
</div>
@endsection