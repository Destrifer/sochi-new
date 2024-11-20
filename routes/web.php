<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\FormController;

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

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/public/about', function () {
    return redirect('/#about');
});

Route::get('/', [IndexController::class, 'index']);
Route::get('/about/', [IndexController::class, 'about']);
Route::get('/contacts/', [IndexController::class, 'contacts']);
Route::get('/{slug}/', [IndexController::class, 'page']);
Route::post('/send-email', [App\Http\Controllers\FormController::class, 'send'])->name('send.email');
