<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>
<body data-bs-theme="dark">
    <div id="app">

        @include('partials.users.navbar')
     

        <main class="py-4 container-fluid">
            <div class="row">
                <div class="col-md-3 d-none d-md-block min-vh-100 border-end border-light">
                  @include('partials.users.sidebar')
                </div>
                <div class="col-md-9">
                    @include('partials.users.new-post')

                    <div class="my-4">

                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        
    </div>

    @include('sweetalert::alert')
    <script src="{{ asset('vendor/fslightbox/fslightbox.js') }}"></script>
</body>
</html>
