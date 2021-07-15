<?php
use App\Http\Controllers\UserControl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarControl;

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
    return view('carhome');
});
Route::get("signup", function () {
    return view('signup');
});
Route::get("login", function () {
    return view('login');
});

Route::post("login", [UserControl::class, 'login']);
Route::post("signup", [UserControl::class, 'signup']);

Route::get('carhome', [CarControl::class, 'carhome']);

