<nav id="g_navi" class="bg-blue-200">
    <h1 class="font-mono font-black` text-5xl text-center text-gray-800 ">TweetSeeker!</h1>
    <a class="hover:underline hover:text-blue-900 hover:text-black font-mono text-lg text-gray-800 m-4 text-center" href="{{ route('tweet.index') }}">Twitter検索</a>
    @auth
        <a class="hover:underline hover:text-blue-900 hover:text-black font-mono text-lg text-gray-800 m-4 text-center" href="{{ route('tweet.keep',['id' => $id]) }}">保存したTweet</a>
    @endauth
</nav>