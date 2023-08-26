<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PosteesController;
use App\Http\Controllers\UserpostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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




Auth::routes();

Route::prefix('')->middleware('auth')->group(function () {
    Route::get('',[HomeController::class,'index'])->name('home');
    Route::get('/welcome', function () {
        return view('/welcome');
    });
    Route::get('/postes',[PosteesController::class,'index'])->name('postes');
    Route::post('/AddPost',[PosteesController::class,'store'])->name('AddPost');
    Route::delete('poste/deletePost/{id}',[PosteesController::class,'destroy']);
    Route::post('poste/Likes',[LikesController::class,'store']);
    Route::delete('poste/UnLikes/{id}',[LikesController::class,'destroy']);

    
    Route::get('/myPostes',[UserpostController::class,"index"])->name('/myPosts');
    Route::get('userPost/{id}',[UserpostController::class,"userPost"])->name('/myPosts');
    Route::get('/myinforation', function () {
        return view('postes.myInformation');
    });

});