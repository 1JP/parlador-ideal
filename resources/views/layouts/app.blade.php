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
        @if (Route::currentRouteName() != 'auth.login')
            <nav class="py-2 border-bottom border-light">
                <div class="d-flex">
                    <div class="p-2 w-100">
                        <h3>Parlador Ideal</h3>
                    </div>
                    <div class="p-2 flex-shrink-1">
                        @if (Auth::user())
                            <dropdown-component>
                                <template v-slot:button>
                                    {{ Auth::user()->name }}
                                </template>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <form class="p-2" method="GET" action="{{ route('auth.logout') }}">
                                        @csrf
                                        <button class="btn btn-primary w-100">
                                            Sair
                                        </button>
                                    </form>
                                    @if (Route::currentRouteName() == 'home')
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a></li>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </dropdown-component>
                        @else
                            <a class="btn btn-primary" href="{{ route('auth.login') }}">Login </a>
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
