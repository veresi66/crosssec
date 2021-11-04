<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ __('User Register test page') }}</title>
    <!-- Scripts -->
    <script src="/scripts/jquery.min.js"></script>
    <script src="/scripts/bootstrap.bundle.min.js"></script>
    <!-- Styles -->
    <link href="/styles/font-awesome.min.css" rel="stylesheet">
    <link href="/styles/bootstrap.min.css" rel="stylesheet">
    <link href="/styles/app.css" rel="stylesheet">
    <link href="/styles/vip.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h1 class="col">User Register</h1>
            </div>
@if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
@auth
                <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log out</a>
@else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
@if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
@endif
@endauth
            </div>
@endif
        </div>
        <div class="row">
            <!-- <div class="col-2"></div> -->
            <div class="col jostify-content-center">
@yield('content')
            </div>
            <!-- <div class="col-2"></div> -->
        </div>
    </div>
</body>

</html>