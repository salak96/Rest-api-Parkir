<?php

use App\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ParkirController;
use App\Http\Controllers\AreaController;

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


//1 Mengecek ketersediaan block dan slot
Route::get('/getAvailableArea', [ParkirController::class, 'getArea']);

//2 Menambahkan data parkir Masuk

Route::get('/parkirIn/{nomer_polisi}', [ParkirController::class, 'parkirIn']);

//3 Menampilkan data parkir Keluar

Route::get('/parkirOut/{nomer_polisi}', [ParkirController::class, 'parkirout']);