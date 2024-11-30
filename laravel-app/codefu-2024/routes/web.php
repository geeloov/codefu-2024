<?php

use App\Http\Controllers\AirPollutionController;
use Illuminate\Http\Request;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaskDetectionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\ItemController;

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
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [RegisterController::class, 'store']);;
Route::get('/welcome', function () {
    return view('auth.welcome');
})->name('welcome');;

Route::get('/login', [LoginController::class, 'loginpage'])->name('login');;
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');;




// Route::middleware('auth')->group(function () {

Route::get('/settings', [SettingsController::class, 'settingspage'])->name('settings');

Route::middleware('auth')->group(function () {
    Route::put('user/update', [UserController::class, 'update'])->name('user.update');
});


Route::post('/detect-mask', [MaskDetectionController::class, 'detectMask']);


Route::get('/mask-detection', function () {
    return view('mask_detection');
});

Route::get('/share_to_social_media', function (Request $request) {
    $imageUrl = $request->query('imageUrl');
    return view('share_to_social_media', ['imageUrl' => $imageUrl]);
})->name('share_to_social_media');

Route::get('forecast', function () {
    return view('forecast');
});

Route::get('/tasks/gpsBased', [TaskController::class, 'gpsBased'])->name('tasks.gps.view');

Route::post('/tasks/complete', [TaskController::class, 'completeTask'])->name('tasks.complete');
Route::post('/tasks/velocity/complete', [TaskController::class, 'completeVelocityTask'])->name('tasks.velocity.complete');

Route::get('/pollution', function () {
    return view('maps.pollution');
});


Route::get('/forecast', [AirPollutionController::class, 'index'])->name('forecast');
Route::get('/forecast/{type}', [AirPollutionController::class, 'showForecast']);

Route::get('/zone-data', [MaskDetectionController::class, 'getZoneData']);
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::post('/buy-item', [ShopController::class, 'buyItem'])->name('buyItem');

Route::get('/home', [Controller::class, 'index'])->name('homepage');

Route::get('/api/sensors', function () {
    $response = Http::get('http://localhost:3000/api/sensors');
    return response()->json($response->json());
});

Route::get('/weather', function () {
    $response = Http::get('http://localhost:7600/get-weather-data');
    return response()->json($response->json());
});

// });