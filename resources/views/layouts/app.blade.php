<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Clubes e Associados</title>

        <link rel="stylesheet" href="/css/app.css" />
    </head>

    <body>
        @include('partials.nav')

        <div class="container">
            @include('partials.flash')

            @yield('content')

            <footer class="row">
                @include('partials.footer')
            </footer>
        </div>
        <script src="/js/app.js"></script>
    </body>
</html>
