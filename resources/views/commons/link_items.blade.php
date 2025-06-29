@if (Auth::check())
    <li><a class="link link-hover" href="{{ route('users.show',Auth::user()->id)  }}">My_recipes</a></li>
    <li><a class="link link-hover" href="{{ route('ingredients.index')}}">食材</a></li>
    <li><a class="link link-hover" href="{{ route('category.index')}}">カテゴリー</a></li>
    <li><a class="link link-hover" href="{{ route('recipes.index')}}">レシピ</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログアウトへのリンク --}}
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">Logout</a></li>
@else
    <li><a class="link link-hover" href="{{ route('recipes.index')}}">レシピ</a></li>
    {{-- ユーザー登録ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">Signup</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('login') }}">Login</a></li>
@endif