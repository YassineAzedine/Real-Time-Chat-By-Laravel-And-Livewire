<?php
use App\Models\Message;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth'])->name('home');
Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('delete_chat', function () {
    Message::truncate();
    return redirect()->route('home');

})->middleware(['auth'])->name('delete_chat');