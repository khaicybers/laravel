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
Route::get('category',[CategoryController::class,'index'])->name('category.index');
// GET categorry/create để hiển thị form nhập dữ liệu
Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
// POST categorry để nhận dữ liệu khi submit form
Route::post('category',[CategoryController::class,'store'])->name('category.store');

// Route::get('category',[CategoryController::class,'delete'])->name('category.delete');
Route::delete('category/{id}',[CategoryController::class,'delete'])->name('category.delete');

Route::get('category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::put('category/{id}',[CategoryController::class,'update'])->name('category.update');

Route::get('', [HomeController::class, 'index'])->name('home.index');