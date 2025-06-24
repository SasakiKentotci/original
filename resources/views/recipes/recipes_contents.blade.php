<h2 class="text-2xl font-semibold mb-4">レシピ一覧</h2>

<div class="bg-gray-100 py-6 flex justify-center">
    <form method="GET" action="{{ route('recipes.index') }}" class="w-full max-w-md">
        <input type="text" name="keyword" placeholder="レシピを検索" class="w-full border rounded px-4 py-2" />
    </form>
</div>

@if (Auth::check())
<a href="{{ route('recipes.create') }}">
    <h2>+レシピ作成</h2>
</a>
@endif
<div class="bg-gray-100 px-6 py-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($recipes as $recipe)
        <a href="{{ route('recipes.show', $recipe->id) }}" class="bg-white rounded shadow hover:shadow-md transition overflow-hidden">
            <img src="{{ asset("img/ramen.png") }}" alt="img" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-lg font-bold">{{ $recipe->title }}</h3>
                <ol>
                    <ul class="list-disc list-inside mb-4">
                        @foreach($recipe->usings as $ingredient) 
                            <li>{{ $ingredient->ingredient }} ({{ $ingredient->pivot->amount }})</li>
                        @endforeach
                    </ul>
                </ol>
            </div>
        </a>
    @if (Auth::check())
    <div>
    @if (Auth::user()->role_id==1 )
    {{-- 投稿削除ボタンのフォーム --}}
        <form method="POST" action="{{ route('recipes.destroy', $recipe->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-error btn-sm normal-case" 
                onclick="return confirm('Delete id = {{ $recipe->id }} ?')">Delete</button>
        </form>
    @endif
    </div>
     @endif
    @endforeach
    </div>
</div>

