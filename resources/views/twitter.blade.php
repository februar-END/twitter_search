<x-layout :id="$id">
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
            <li>
                <p><button type="button" id="checkAllButton" >Check All</button></p>
            </li>
            <li>
                <p><button type="button" id="clearAllButton" >Clear All</button></p>
            </li>
        </ul>
            @if(session('feedback.success'))
                <p style="color: green">{{ session('feedback.success') }}</p>
            @endif
            @if(session('feedback.error'))
                <p style="color: red">{{ session('feedback.error') }}</p>
            @endif
    </header>

    @auth
    <main>
        <form action="{{ route('tweet.save') }}" method="post" id="tweet">
            @csrf
    @endauth
        <table border = "1">
            @foreach ($twitter as $twitter)
            <tr><td>
                <input type="checkbox" id="checkbox{{ $loop->iteration }}" name="check[]" value="{{ $twitter->text }}" class="checks">
                {{ $twitter->text }}
            </td></tr>
            @endforeach
        </table>
        </form>
    </main>
    
</x-layout> 