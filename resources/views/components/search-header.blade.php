<form action="{{ route('tweet.index') }}" method="get">
    @csrf
        <input class="shadow appearance-none border rounded  py-2 px-3 mx-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="searchWord" placeholder="キーワードを入力">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-1 my-2 rounded-xl">SEARCH</button>
</form>
<button type="button" id="checkAllButton" type="submit" name="top" form="tweet" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-1 mx-4 my-2 rounded-xl">Check All</button>
<button type="button" id="clearAllButton" type="submit" name="top" form="tweet" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-1 mx-4 my-2 rounded-xl">Clear All</button>
<button type="submit" name="top" form="tweet" type="submit" name="top" form="tweet" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-1 mx-4 my-2 rounded-xl">SAVE Tweet</button>
@if(session('feedback.success'))
    <p style="color: green">{{ session('feedback.success') }}</p>
@endif
@if(session('feedback.error'))
    <p style="color: red">{{ session('feedback.error') }}</p>
@endif