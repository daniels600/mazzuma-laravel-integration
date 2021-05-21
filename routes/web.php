<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MomoController;

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
    return view('momo');
});


Route::get('/form',function (){
    return view('momo');
});

Route::get('/validate_account',function (){
    return view('validate_account');
});

Route::post('momo', [MomoController::class, 'makePayment'])->name('momo');


Route::get('check_transaction/{id}', [MomoController::class, 'checkTransaction']);

Route::post('validateAccount', [MomoController::class, 'validate_Account'])->name('validateAccount');

Route::get('checkBalance', [MomoController::class, 'getBalance'])->name('checkBalance');