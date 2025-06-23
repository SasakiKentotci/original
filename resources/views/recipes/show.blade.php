@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-4 bg-gray-100 rounded shadow">
    <h2 class="font-semibold text-2xl font-bold mb-2">{{ $recipe->title }}</h2>

    {{-- レシピ画像 --}}
    <div class="mb-6">
        <img src="{{ asset( 'storage/images/m68AX8assISAk0HhwWCtsnKmQXPLgkPUdWs57r56.jpg') }}" alt="レシピ画像" class="w-full h-80 object-cover rounded">
        <p>{{ $recipe->image}}</p>
    </div>

    {{-- 下段：材料 + 作り方 --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- 材料 --}}
        <div class="md:col-span-1 bg-white p-4 rounded shadow">
            <h2 class="text-lg font-bold mb-2">材料</h2>
            <ul class="list-disc pl-5 space-y-1 text-sm">
            @foreach($recipe->usings as $ingredient) 
                <li>{{ $ingredient->ingredient }} ({{ $ingredient->pivot->amount }})</li>
            @endforeach
            </ul>
        </div>

        {{-- 作り方 --}}
        <div class="md:col-span-2 bg-white p-4 rounded shadow">
            <h2 class="text-lg font-bold mb-4">作り方</h2>
            @foreach(json_decode($recipe->content) as $index =>$content)
                <div class="mb-6">
                    <p class="font-semibold mb-2">手順{{ $index+1}}</p>
                    <li class="text-sm text-gray-600">{{ Str::limit($content, 50) }}</li>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection