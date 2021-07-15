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
    return redirect('carhome');
});
Route::get("signup", function () {
    return view('signup');
});
Route::get("login", function () {
    return view('login');
});
Route::get("logout", function () {
    session()->pull('owner');
    return view('login');
});
Route::post("login", [UserControl::class, 'login']);
Route::post("signup", [UserControl::class, 'signup']);


Route::view('new', 'new');
Route::post('addnewpost', [CarControl::class, 'newpost']);
Route::get('author', [CarControl::class, 'authorpost']);
route::get('delete/{id}', [CarControl::class, 'delete']);
route::get('detail/{id}', [CarControl::class, 'detail']);

Route::get('carhome', [CarControl::class, 'carhome']);
Route::get('search', [CarControl::class, 'search']);
Route::get('addpost', function () {
    return view('addpost');
});

Route::post("edit", [CarControl::class, 'edit']);
Route::post("update", [CarControl::class, 'update']);