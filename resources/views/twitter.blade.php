<!DOCTYPE html>
<html>
    <head>
        <title>TweetSeeker</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
<div>
    <a href="{{ route('tweet.index') }}" name="top"><p>Twitter検索フォーム</p></a>
    @auth
    <a href="{{ route('tweet.keep',['id' => $id]) }}"><p>保存したTweet</p></a>
    @endauth
    <form action="{{ route('tweet.index') }}" method="get">
        @csrf
        <label for="tweet-content">Tweet検索</label>
        <input type="text" name="searchWord" placeholder="キーワードを入力">
        <button type="submit">検索</button>
    </form>
</div>

@auth
<div>
    <form action="{{ route('tweet.save') }}" method="post">
        @csrf
        <p><button type="submit">選択したTweetの保存</button></p>
        @if(session('feedback.success'))
        <p style="color: green">{{ session('feedback.success') }}</p>
        @endif
       
@endauth
        <table border = "1">
            @foreach ($twitter as $twitter)
            <tr><td>
            <input type="checkbox" id="checkbox{{ $loop->iteration }}" name="check[]" value="{{ $twitter->text }}">
            {{ $twitter->text }}</td></tr>
            @endforeach
        </table>
    </form>
</div>

    <a href="#top">ページトップへ</a>
</html>