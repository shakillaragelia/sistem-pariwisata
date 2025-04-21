<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DISPAR</title>
    <link rel="stylesheet" href="{{ asset('ragel/ragel/assets/css/style.css') }}">
</head>
<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>
