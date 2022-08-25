@auth
    <button type="button" id="checkAllButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-1 mx-4 my-2 rounded-xl">Check All</button>
    <button type="button" id="clearAllButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-1 mx4 my-2 rounded-xl">Clear All</button>
    <button type="submit" name="top" form="tweet" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-1 mx-4 my-2 rounded-xl">選択したTweetを削除</button>
@endauth
@if(session('feedback.success'))
    <p style="color: green">{{ session('feedback.success') }}</p>
@endif
@if(session('feedback.error'))
    <p style="color: red">{{ session('feedback.error') }}</p>
@endif            