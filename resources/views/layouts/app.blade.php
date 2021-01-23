<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <title>97-Homu Properties</title>
    <script src="{{ asset('js/app.js') }}" async></script>

    <style>
        body {
            background: gray;
            box-sizing: border-box;
            /*overflow: hidden;*/
            font-family: 'Open-sans', sans-serif;
        }
    </style>
</head>
<body>
    <div id="app">
    @yield('content')
    </div>
</body>
</html>