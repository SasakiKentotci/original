<div class="mt-4">
    @if (isset($recipes))
        <ul class="list-none">
            @foreach ($recipes as $recipe)
                <li class="flex items-start gap-x-2 mb-4">
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($recipe->title)) !!}</p>
                    </div>
                    <div>
                    @if (Auth::id() == $recipe->user_id)
                        {{-- 投稿削除ボタンのフォーム --}}
                        <form method="POST" action="{{ route('recipes.destroy', $recipe->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-error btn-sm normal-case" 
                                onclick="return confirm('Delete id = {{ $recipe->id }} ?')">Delete</button>
                        </form>
                    @endif
                    </div>
                </li>
            @endforeach
        </ul>
        {{-- ページネーションのリンク --}}
        {{ $recipes->links() }}
    @endif
</div>