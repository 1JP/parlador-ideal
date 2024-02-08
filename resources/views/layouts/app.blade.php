<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/produto.png') }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    @routes
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-info">
    <div id="app">
        @if (Route::currentRouteName() != 'login')
            <nav class="py-2 border-bottom border-light">
                <div class="d-flex">
                    <div class="p-2 w-100">
                        <h3>Parlador Ideal</h3>
                    </div>
                    <div class="p-2 flex-shrink-1">
                        @if (Auth::user())
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button tabindex="0" class="btn btn-primary m-1 flex flex-row items-center">
                                    <i class="mr-2" data-lucide="user-circle-2"></i>
                                    <span class="mr-2">Sair</span>
                                </button>
                            </form>
                        @else
                            <a class="btn btn-primary" href="{{ route('login') }}">Login </a>
                        @endif
                    </div>
                </div>
            </nav>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('layouts.partials.scripts')
</body>
</html>
