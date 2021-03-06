<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;

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

Route::get('/profile/network',[ProfileController::class, 'getNetworks']);

Route::post('profile/network/delete',[ProfileController::class, 'deleteNetwork'])
    ->middleware('admin');

Route::post('profile/network/add',[ProfileController::class, 'createNetwork'])
    ->middleware('admin');

Route::post('/user/add',[AuthController::class, 'createUser'])
    ->middleware('guest');

Route::post('/user/login',[AuthController::class, 'loginUser'])
    ->middleware('guest');

Route::post('/profile',[ProfileController::class, 'showPost']);

Route::post('/profile/edit/',[ProfileController::class, 'updatePost'])
    ->middleware('admin');

Route::get('/user/status/',[AuthController::class, 'getUserStatus']);
Route::get('/user/logout/',[AuthController::class, 'logOutUser'])
    ->middleware('auth');

Route::get('/{any}', function () {
    return view('index');
})->where('any','.*');



