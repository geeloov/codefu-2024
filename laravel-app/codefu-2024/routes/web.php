<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/auth/google', [GoogleController::class, 'googlepage']);
Route::get('/auth/google/callback', [GoogleController::class, 'googlecallback']);

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});
 
// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('google')->user();
// });


Route::get('/auth/callback', function () {
    $googleUser = Socialite::driver('google')->user();
 
    $user = User::updateOrCreate([
        'google_id' => $googleUser->id,
    ], [
        'name' => $googleUser->name,
        'email' => $googleUser->email,
        'google_token' => $googleUser->token,
        'google_refresh_token' => $googleUser->refreshToken,
    ]);
 
    Auth::login($user);
 
    return redirect('/dashboard');
});

Route::get('/auth/facebook', [FacebookController::class, 'facebookpage']);
Route::get('/auth/facebook/callback', [FacebookController::class, 'facebookcallback']);

Route::get('/welcome', function () {
    return view('auth.welcome');
});

Route::get('/', function () {
    return view('welcome');
});
