<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;

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
Route::controller(Controller::class)->group(function () {
    Route::middleware('guest')->group(function () {
        // ...
        Route::get('auth/{provider}/redirect', 'loginSocial')
            ->name('socialite.auth');

        Route::get('auth/{provider}/callback', 'callbackSocial')
            ->name('socialite.callback');
    });

});
// ...