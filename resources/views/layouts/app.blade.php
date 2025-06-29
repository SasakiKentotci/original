<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>レシピサイト</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite('resources/css/app.css')
    </head>

    <body>
        {{-- ナビゲーションバー --}}
        @include('commons.navbar')


        <div class="container mx-auto">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')
        </div>

        <footer class="text-center text-sm text-gray-500 mt-10 mb-4">
            &copy; 2025 My Recipe App
        </footer>

    </body>
</html>