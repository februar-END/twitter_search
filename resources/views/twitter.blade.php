<x-layout :id="$id">
    <header class="bg-blue-200 sticky top-0">
        <x-header-top :id="$id"></x-header-top>
        <x-search-header></x-search-header>
    </header>

    @auth
    <main>
        <form action="{{ route('tweet.save') }}" method="post" id="tweet">
            @csrf
    @endauth
        <table class="border-collapse border-2 border-gray-500 bg-white mx-4 my-4">
            @foreach ($twitter as $twitter)
            <tr><td class="border px-4 py-2">
                <input type="checkbox" id="checkbox{{ $loop->iteration }}" name="check[]" value="{{ $twitter->text }}" class="checks form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer">
                {{ $twitter->text }}
            </td></tr>
            @endforeach
        </table>
        </form>
    </main>  
</x-layout> 