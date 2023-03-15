<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAuthorized;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AuthorController;

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


Route::get('login', [ClientController::class, 'login'])->name('login');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(IsAuthorized::class)->group(function () {

    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('authors', [AuthorController::class, 'index']);
    Route::get('authors/{id}', [AuthorController::class, 'view']);
    Route::delete('authors/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');

    Route::get('books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('books', [BookController::class, 'store']);
    Route::delete('books', [BookController::class, 'destroy'])->name('books.destroy');
    Route::post('logout', [BookController::class, 'logout'])->name('logout');
});