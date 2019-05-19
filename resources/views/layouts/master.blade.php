<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dict03</title>

    {{-- CSS --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/vendor.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    

    <div id="app" class="app">
        @yield('content')
    </div>


    {{-- JS --}}
    {{-- <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>