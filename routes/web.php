<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
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

Route::get('hello', function () {
    // return view('home');
    echo '<h1>Hello World</h1>';
});
Route::post('/demo', function () {
    echo '<h1>Đây là phương thức post</h1>';
    echo '<h2>Link: '.url('demo').'</h2>';
});
Route::get('', [HomeController::class, 'index'])->name('home.index');
Route::get('login', [HomeController::class, 'login'])->name('home.login');
Route::post('login', [HomeController::class, 'check_login']);
Route::get('upload', [HomeController::class, 'upload'])->name('home.upload');

// route này validate dữ liệu khi submit form
Route::post('upload', [HomeController::class, 'handle_upload']);
//route category
Route::get('Category', function () {
    return view('category.index');
});
Route::get('category','CategoryController@index')->name('category.index');

// GET categorry/create để hiển thị form nhập dữ liệu
Route::get('category/create','CategoryController@create')->name('category.create');
// POST categorry để nhận dữ liệu khi submit form
Route::post('category','CategoryController@store')->name('category.store');



<<<<<<< HEAD
=======
// Route::get('', [HomeController::class, 'index'])->name('home.index');
>>>>>>> 794f7cdfb69aaad5d88a318694e60c686ffa6163
