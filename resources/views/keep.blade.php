<x-layout :id="$id">
    <header class="bg-blue-200 sticky top-0">
        <x-header-top :id="$id"></x-header-top>
        <x-keep-header></x-keepx-header>
        <div class="mx-4">{{ $tweets->links() }}</div>
    </header>
    <main>
        <form action="{{ route('tweet.delete',['id' => $id]) }}" method="post" id="tweet">
             @method('DELETE')
             @csrf
            @auth
            <table class="border-collapse border-2 border-gray-500 bg-white mx-4">
                @foreach ($tweets as $tweet)
                <tr><td class="border px-4 py-2">
                    <input type="checkbox" id="checkbox{{ $loop->iteration }}" name="check[]" value="{{ $tweet->id }}" class="checks form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                    {{ $tweet->content }}
                </td></tr>
                @endforeach
            </table>
            @endauth
        </form>
    </main>
    
    <script src="{{ asset('/js/app.js') }}"></script>

</x-layout>   