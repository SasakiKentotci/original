@if (isset($recipes))
<h2 class="text-2xl font-semibold mb-4">レシピ一覧</h2>
@if (Auth::check())
<a href="{{ route('recipes.create') }}">
    <h2>+レシピ作成</h2>
</a>
@endif

<div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 gap-6">
    @foreach ($recipes as $recipe)
    <a href="{{ route('recipes.show', $recipe->id) }}" class="bg-white p-4 rounded shadow hover:shadow-lg transition">
        <img src="{{asset("img/ramen.png")}}" class="w-full h-40 object-cover rounded mb-2">
        <h3 class="text-lg font-bold">{{ $recipe->title }}</h3>
        <ol>
            <ul class="list-disc list-inside mb-4">
            @foreach($recipe->usings as $ingredient) 
            <li>{{ $ingredient->ingredient }} ({{ $ingredient->pivot->amount }})</li>
            @endforeach
    </ul>
        </ol>
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
@else
<p>はいってないよ！</p>
@endif
