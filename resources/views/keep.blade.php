<x-layout :id="$id">
    <header>
        <ul>
        @auth
            <li>
                <button type="submit" name="top" form="tweet">選択したTweetを削除</button>
            </li>
            <li>
                <p><button type="button" id="checkAllButton" >Check All</button></p>
            </li>
            <li>
                <p><button type="button" id="clearAllButton" >Clear All</button></p>
            </li>
        @endauth
        @if(session('feedback.success'))
            <p style="color: green">{{ session('feedback.success') }}</p>
        @endif
        @if(session('feedback.error'))
            <p style="color: red">{{ session('feedback.error') }}</p>
        @endif
    </header>
    <main>
        <form action="{{ route('tweet.delete',['id' => $id]) }}" method="post" id="tweet">
             @method('DELETE')
             @csrf
            @auth
            <table border = "1">
                @foreach ($tweets as $tweet)
                <tr><td>
                    <input type="checkbox" id="checkbox{{ $loop->iteration }}" name="check[]" value="{{ $tweet->id }}" class="checks">
                    {{ $tweet->content }}
                </td></tr>
                @endforeach
            </table>
            @endauth
        </form>
    </main>
    <script src="{{ asset('/js/app.js') }}"></script>
</x-layout>   