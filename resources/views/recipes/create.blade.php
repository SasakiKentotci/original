@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-6">レシピを投稿する</h2>

<form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- タイトル --}}
    <div class="mb-6">
        <label class="block text-lg font-semibold mb-2">レシピ名</label>
        <input type="text" name="title" class="w-full border rounded p-2" placeholder="例：ふわふわパンケーキ" required>
    </div>

    {{-- メイン画像 --}}
    <div class="mb-6">
        <label class="block text-lg font-semibold mb-2">メイン画像</label>
        <input type="file" name="image" class="w-full border rounded p-2">
    </div>

    {{-- 材料入力（動的に追加） --}}
    <div class="mb-6">
        <label class="block text-lg font-semibold mb-2">材料</label>
        <div id="ingredients-list">
            <div class="group form-ingredient">
                <div class="flex mb-2">
                    <div class="">
                        <input type="hidden" name="ingredientIds[]" class="input-ingredient-id w-2/3 border rounded p-2 mr-2" placeholder="材料名">
                        <input type="text" name="ingredientNames[]" class="input-ingredient-name w-2/3 border rounded p-2 mr-2" placeholder="材料名">
                    </div>
                    <input type="text" name="ingredientAmounts[]" class="w-1/3 border rounded p-2" placeholder="量（例：100g）">
                    <button type="button" onclick="removeIngredient(this)" class="text-red-500 ml-2">削除</button>
                </div>
                <div class="invisible group-focus-within:visible">
                    @foreach($ingredients as $ingredient)
                        <button type="button" onClick="setIngredient(this, '{{ $ingredient->id }}', '{{ $ingredient->ingredient }}')" class="">{{ $ingredient->ingredient }}</button>
                    @endforeach
                </div>
            </div>
        </div>
        <button type="button" onclick="addIngredient()" class="text-blue-600 mt-2 hover:underline">+ 材料を追加</button>
    </div>

    <div class="mb-6">
        <label class="block text-lg font-semibold mb-2">作り方</label>
        <div id="steps-list">
            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium">手順 1</label>
                <textarea name="content[]" class="w-full border rounded p-2 mb-2" rows="2" placeholder="手順を説明"></textarea>
                <input type="file" name="steps[0][image]" class="w-full border rounded p-2">
                <button type="button" onclick="removeStep(this)" class="text-red-500 mt-2">削除</button>
            </div>
        </div>
        <button type="button" onclick="addStep()" class="text-blue-600 mt-2 hover:underline">+ 手順を追加</button>
    </div>

    {{-- 提出ボタン --}}
    <div>
        <button type="submit" class="btn bg-blue-100 btn-outline text-blue-60 px-6 py-2 rounded hover:bg-blue-600">
            投稿する
        </button>
    </div>
</form>

{{-- JS：動的に材料や手順を追加 --}}
<script>
function addStep() {
    const list = document.getElementById('steps-list');
    const stepCount = list.children.length; // 現在の手順数を取得
    const div = document.createElement('div');
    div.className = "mb-4";
    div.innerHTML = `
        <label class="block mb-1 text-sm font-medium">手順 ${stepCount + 1}</label>
        <textarea name="content[]" class="w-full border rounded p-2 mb-2" rows="2" placeholder="手順を説明"></textarea>
        <input type="file" name="steps[${stepCount}][image]" class="w-full border rounded p-2">
        <button type="button" onclick="removeStep(this)" class="text-red-500 mt-2">削除</button>
    `;
    list.appendChild(div);
}

function removeStep(button) {
    const step = button.closest('.mb-4');
    step.remove();
    updateStepLabels(); // 手順のラベルを更新
}

// 手順のラベルを更新
function updateStepLabels() {
    const steps = document.querySelectorAll('#steps-list .mb-4');
    steps.forEach((step, index) => {
        const label = step.querySelector('label');
        label.textContent = `手順 ${index + 1}`;
        // 画像のname属性も更新
        const inputFile = step.querySelector('input[type="file"]');
        inputFile.name = `steps[${index}][image]`;
    });
}

// 材料を削除
function removeIngredient(button) {
    const ingredient = button.closest('.form-ingredient');
    ingredient.remove();
}
</script>
@endsection