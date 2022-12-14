<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;

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

Route::resource('/item', ItemController::class);

Route::get('/', function () {
    if (!isset($_SESSION))
            session_start();
    return '<h1><a href="/item">LISTA</a></h1>';
});