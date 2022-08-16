<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('twitter', 'App\Http\Controllers\TwitterController@index')
    ->name('tweet.index');
Route::middleware('auth')->group(function (){
    Route::post('twitter', 'App\Http\Controllers\TwitterController@save')
        ->name('tweet.save');
    Route::get('keep/{id}', 'App\Http\Controllers\TwitterController@keep')
        ->name('tweet.keep')->where('id', '[0-9]+');
    Route::delete('keep/{id}', 'App\Http\Controllers\TwitterController@delete')
        ->name('tweet.delete')->where('id', '[0-9]+');
});