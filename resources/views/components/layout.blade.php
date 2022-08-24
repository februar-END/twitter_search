<!DOCTYPE html>
<html>
    <head>
        <title>TweetSeeker</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

<body>
    <div class="container">
        <header>
            <nav id="g_navi">
            <h1>TweetSeeker!</h1>
            <ul class="global-nav">
                <li><a href="{{ route('tweet.index') }}"><p>Twitter検索</p></a></li>
                @auth
                <li><a href="{{ route('tweet.keep',['id' => $id]) }}"><p>保存したTweet</p></a></li>
                @endauth   
            </ul>   
            </nav>
        </header>

        <div>
            {{ $slot }}
        </div>
        <footer>
            <a href="#top">ページトップへ</a>
        </footer>
    </div>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>