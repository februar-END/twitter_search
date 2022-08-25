<!DOCTYPE html>
<html>
    <head> 
        <title>TweetSeeker</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!--<link rel="stylesheet" href="{{ asset('css/style.css') }}">-->
        @vite('resources/css/app.css')
    </head>

<body class="flex-1 bg-blue-200">
    <div class="container">
        <div>
            {{ $slot }}
        </div>
        <footer>
        </footer>
    </div>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>