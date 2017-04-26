<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
    </body>
</html>
