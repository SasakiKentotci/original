<h2 class="text-2xl font-semibold mb-4">レシピ一覧</h2>

<div class="bg-gray-100 py-6 flex justify-center items-center">
    <form  action="{{ route('recipes.search') }}" method="POST" >
        @csrf
        <input type="text" name="keyword" placeholder="レシピを検索" class="flex-grow border rounded-l px-4 py-2 " />
        <button type="submit" class="bg-blue-500  rounded-r px-4 py-2 hover:bg-blue-600 transition">検索</button>
    </form>
</div>

@if (Auth::check())
    <div class="flex justify-center mb-4">
        <a href="{{ route('recipes.create') }}" class="bg-red-500  rounded-full px-4 py-2 flex items-center hover:bg-red-500 transition">
            <span class="mr-2">+</span> レシピ作成
        </a>
    </div>
@endif
<div class="bg-gray-100 px-6 py-4 justify-center">
    <div class="grid grid-cols-3 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($recipes as $recipe)
            <a href="{{ route('recipes.show', $recipe->id) }}" class="bg-white rounded shadow hover:shadow-md transition overflow-hidden">
                @if($recipe->image)
                <img src="{{ asset( str_replace("public/",'storage/',$recipe->image)) }}" alt="レシピ画像" class="w-24 h-24 object-cover rounded">
                @endif
                <div class="p-4">
                    <h3 class="text-lg font-bold">{{ $recipe->title }}</h3>
                    <ul class="list-disc list-inside mb-4">
                        @foreach ($recipe->usings as $ingredient)
                            <li>{{ $ingredient->ingredient }} ({{ $ingredient->pivot->amount }})</li>
                        @endforeach
                    </ul>
                </div>
            </a>

    @if (Auth::check())
    @if (Auth::user()->role_id==1 )
    <div>
    {{-- 投稿削除ボタンのフォーム --}}
        <form method="POST" action="{{ route('recipes.destroy', $recipe->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-error btn-sm normal-case" 
                onclick="return confirm('Delete id = {{ $recipe->id }} ?')">Delete</button>
        </form>
    </div>
    @endif
    @endif
    
    @endforeach
    </div>
</div>

