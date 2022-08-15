<!DOCTYPE html>
<html>
    <head>
        <title>TweetKeep</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
<div>
    <a href="{{ route('tweet.index') }}" name="top"><p>Twitter検索フォーム</p></a>
    <a href="{{ route('tweet.keep') }}"><p>保存したTweet</p></a>
    @if(session('feedback.success'))
        <p style="color: green">{{ session('feedback.success') }}</p>
    @endif
    <form action="{{ route('tweet.delete') }}" method="post">
        @method('DELETE')
        @csrf
        <p><button type="submit">選択したTweetを削除</button></p>
        <table border = "1">
            @foreach ($tweets as $tweet)
            <tr><td>
                <input type="checkbox" id="checkbox{{ $loop->iteration }}" name="check[]" value="{{ $tweet->id }}">
                {{ $tweet->content }}
            </td></tr>
            @endforeach
        </table>
</div>


    <a href="#top">ページトップへ</a>
</html>