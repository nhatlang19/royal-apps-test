<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Middleware\EnsureTokenIsValid;
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

Route::get('/login', [AuthController::class, 'get'])->name('show-login');
Route::post('/login', [AuthController::class, 'post'])->name('login');

Route::group(['middleware' => [EnsureTokenIsValid::class]], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/authors', [AuthorController::class, 'lists'])->name('author-lists');
    Route::get('/authors/{id}', [AuthorController::class, 'view'])->name('author-view');
    Route::get('/authors/{id}/delete', [AuthorController::class, 'destroy'])->name('author-destroy');
    Route::get('/books/add', [BookController::class, 'add'])->name('book-add');
    Route::post('/books/save', [BookController::class, 'save'])->name('book-save');
});
