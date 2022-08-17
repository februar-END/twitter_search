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
                <ul>
                    <li>
                        <form action="{{ route('tweet.index') }}" method="get">
                            @csrf
                            <input type="text" name="searchWord" placeholder="キーワードを入力">
                            <button type="submit">SEARCH</button>
                        </form>
                    </li>
                    <li>
                        <p><button type="submit" name="top" form="tweet">SAVE Tweet</button></p>
                    </li>
                </ul>
        </header>



        @auth
        <main>
            <form action="{{ route('tweet.save') }}" method="post" id="tweet">
                @csrf
                @if(session('feedback.success'))
                    <p style="color: green">{{ session('feedback.success') }}</p>
                @endif
        @endauth
                <table border = "1">
                    @foreach ($twitter as $twitter)
                    <tr><td>
                        <input type="checkbox" id="checkbox{{ $loop->iteration }}" name="check[]" value="{{ $twitter->text }}">
                        {{ $twitter->text }}
                    </td></tr>
                    @endforeach
                </table>
            </form>
        </main>
        <footer>
            <a href="#top">ページトップへ</a>
        </footer>
    </div>
</body>
</html>