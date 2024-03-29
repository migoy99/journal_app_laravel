<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\TechnewsController as TechnewsController;
use App\Models\Journal;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// GOOGLE SIGN IN AND AUTHENTICATION ROUTE
Route::controller(LoginController::class)->group(function () {
    Route::get('/auth/google', 'redirectToGoogle')->name('google.auth');
    Route::get('/auth/google-callback', 'handleGoogleCallback');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(JournalController::class)->group(function () {

    Route::get('/', 'getAllJournal')->name('home');
    Route::get('/article/{id}/{title}', 'getParsedJournal');

    Route::middleware(['auth'])->group(function () {
        Route::post('/createjournal', 'storeJournal')->name('savejournal');
    });

    Route::get('/write', 'returnCreateJournalView')->name('write')->middleware('auth');

});

// ROUTE FOR TECH NEWS PAGE
Route::get('/technews', function (){
    return view('technews', ['news' => News::getNewsString()]);
})->name('technews');

// ROUTE FOR LOGIN PAGE
Route::view('/login', 'login')->name('login');

// ROUTE FOR AUTHORS LOGIN PAGE
Route::get('/authors', function (){
    return view('authors', ['curUser' => Auth::user(), 'authors' => User::getAllUsers()]);
})->name('authors');


