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
            <a href="{{ route('tweet.index') }}"><p>Twitter検索フォーム</p></a>
            @auth
                <a href="{{ route('tweet.keep',['id' => $id]) }}"><p>保存したTweet</p></a>
            @endauth
            <form action="{{ route('tweet.index') }}" method="get">
                @csrf
                <label for="tweet-content">Tweet検索</label>
                <input type="text" name="searchWord" placeholder="キーワードを入力">
                <button type="submit">検索</button>
            </form>
            <p><button type="submit" name="top" form="tweet">選択したTweetの保存</button></p>
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