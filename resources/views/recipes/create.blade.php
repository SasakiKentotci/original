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
            <div class="flex mb-2">
                <input type="text" name="ingredients[0][name]" class="w-2/3 border rounded p-2 mr-2" placeholder="材料名">
                <input type="text" name="ingredients[0][amount]" class="w-1/3 border rounded p-2" placeholder="量（例：100g）">
            </div>
        </div>
        <button type="button" onclick="addIngredient()" class="text-blue-600 mt-2 hover:underline">+ 材料を追加</button>
    </div>


    <div class="mb-6">
        <label class="block text-lg font-semibold mb-2">作り方</label>
        <div id="steps-list">
            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium">手順 1</label>
                <textarea name="steps[0][description]" class="w-full border rounded p-2 mb-2" rows="2" placeholder="手順を説明"></textarea>
                <input type="file" name="steps[0][image]" class="w-full border rounded p-2">
            </div>
        </div>
        <button type="button" onclick="addStep()" class="text-blue-600 mt-2 hover:underline">+ 手順を追加</button>
    </div>

    {{-- 提出ボタン --}}
    <div>
        <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600">
            投稿する
        </button>
    </div>
</form>

{{-- JS：動的に材料や手順を追加 --}}
<script>
let ingredientIndex = 1;
function addIngredient() {
    const list = document.getElementById('ingredients-list');
    const div = document.createElement('div');
    div.className = "flex mb-2";
    div.innerHTML = `
        <input type="text" name="ingredients[${ingredientIndex}][name]" class="w-2/3 border rounded p-2 mr-2" placeholder="材料名">
        <input type="text" name="ingredients[${ingredientIndex}][amount]" class="w-1/3 border rounded p-2" placeholder="量">
    `;
    list.appendChild(div);
    ingredientIndex++;
}

let stepIndex = 1;
function addStep() {
    const list = document.getElementById('steps-list');
    const div = document.createElement('div');
    div.className = "mb-4";
    div.innerHTML = `
        <label class="block mb-1 text-sm font-medium">手順 ${stepIndex + 1}</label>
        <textarea name="steps[${stepIndex}][description]" class="w-full border rounded p-2 mb-2" rows="2" placeholder="手順を説明"></textarea>
        <input type="file" name="steps[${stepIndex}][image]" class="w-full border rounded p-2">
    `;
    list.appendChild(div);
    stepIndex++;
}
</script>
@endsection