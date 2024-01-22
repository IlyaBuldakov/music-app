<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//

// Authentication 'GET'
Route::get('/login', function () {
    return view('auth/login');
})->middleware('guest')->name('loginForm');

Route::get('/register', function () {
    return view('auth/register');
})->middleware('guest')->name('registerForm');

Route::get('/home', [UserController::class, 'home'])->middleware('auth')->name('home');

// Handling auth data
Route::post('/register', [UserController::class, 'create'])->name('register');
Route::post('/login', [UserController::class, 'authenticate'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Artist
Route::get('artists/filter', [ArtistController::class, 'filter'])->name('artists.filter');
Route::get('artists/{artistId}/albums', [ArtistController::class, 'albums'])->name('artists.albums');
Route::resource('artists', ArtistController::class);

// Album
Route::get('albums/filter', [AlbumController::class, 'filter'])->name('albums.filter');
Route::resource('albums', AlbumController::class);

// User
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('artists', [UserController::class, 'getOwnArtists'])->name('user.artists');
    Route::get('albums', [UserController::class, 'getOwnAlbums'])->name('user.albums');
});
