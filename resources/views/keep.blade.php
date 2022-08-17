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

        <header>
            @if(session('feedback.success'))
                <p style="color: green">{{ session('feedback.success') }}</p>
            @endif
            @auth
            <p><button type="submit" name="top" form="tweet">選択したTweetを削除</button></p>
            @endauth
        </header>
        <main>
            <form action="{{ route('tweet.delete',['id' => $id]) }}" method="post" id="tweet">
                @method('DELETE')
                @csrf
                @auth
                <table border = "1">
                    @foreach ($tweets as $tweet)
                    <tr><td>
                        <input type="checkbox" id="checkbox{{ $loop->iteration }}" name="check[]" value="{{ $tweet->id }}">
                        {{ $tweet->content }}
                    </td></tr>
                    @endforeach
                </table>
                @endauth
            </form>
        </main>
        <footer>
            <a href="#top">ページトップへ</a>
        </footer>
    </div>


    
</html>