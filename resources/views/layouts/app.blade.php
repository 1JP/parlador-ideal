<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @routes
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-info">
    <div id="app">
        <header>
            <div class="py-2 border-bottom border-light">
              <div class="container">
                <div class="row d-flex align-items-center justify-content-start">
                  <div class="col-lg-3 col-12 d-flex justify-content-center logo">
                    <a href="index.html"><img class="desktop" src="img/logo/logo-com-assinatura.svg"></a>
                    <a href="index.html"><img class="mobile" src="img/logo/logo-sem-assinatura.svg"></a>
                  </div>
                  <div class="col-12 col-sm-12 d-none d-lg-block d-xl-block col-lg-3"></div>
                  <div class="col-12 col-lg-3"></div>
                  <div class="d-flex align-items-center px-0 col-12 col-lg-3">
                    <div class="mr-2 d-none d-lg-block d-xl-block">
                      <a class="text-dark" href="{{ route('login') }}">Login </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Menu all categorias - end -->
            <!-- Menu mobile - end -->
            <!-- Menu all categorias overlay - start -->
            <div class="zeynep-overlay"></div>
            <!-- Menu all categorias overlay - end -->
        </header>
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('layouts.partials.scripts')
</body>
</html>
