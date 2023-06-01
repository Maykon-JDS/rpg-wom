<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    
    <link rel="stylesheet" href="/styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- JS -->
    <script src="{{asset('jquery/jquery.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container-fluid">
        <header class="row-header row bg-dark px-5">
            <div class="box-logo d-flex align-items-center justify-content-center justify-content-lg-start">
                <a href={{ route('site.home') }} class="h-50"><img src="/imgs/logo/logotipoWorldofMagic.png" class="h-100" alt=""></a>
            </div>
            <nav class="col d-flex justify-content-end ">
                @yield('nav')
            </nav>
        </header>

        @yield('content')

        <footer class="row-footer row">
            <div class="col">

            </div>
        </footer>
    <script src="{{asset('js/GeneratorCssBackgroundImage.js')}}"></script>
</body>

</html>