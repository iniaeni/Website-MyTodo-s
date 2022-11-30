<?php

use Illuminate\Support\Facades\Route;
use
App\Http\Controllers\DailyController;


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
//auth
Route::middleware('isGuest')->group(function(){
    Route::get('/', [DailyController::class, 'login'])->name('login');// '/' waktu rounting nya bakal nampilin welcome terus welcome itu ada di folder recources  
    // Route::get('/', [DailyController::class, 'login']);
    Route::get('register', [DailyController::class, 'register']);
    Route::post('register', [DailyController::class, 'inputRegister'])->name('register.post');
    Route::post('/login', [DailyController::class, 'auth'])->name('login.auth');
});
Route::get('/logout', [DailyController::class, 'logout'])->name('logout');
// Route::get('/daily', [DailyController::class, 'index'])->name('daily.index');


//daily 
Route::middleware('isLogin')->prefix('/todo')->name('todo.')->group(function() { // prefix = induknya yang ada di dalam prefix itu anak anaknya
    Route::get('/', [DailyController::class, 'index'])->name('index'); // 
    Route::get('/complated', [DailyController::class, 'complated'])->name('complated');
    Route::get('/create', [DailyController::class, 'create'])->name('create');
    Route::post('/store', [DailyController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [DailyController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [DailyController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [DailyController::class, 'destroy'])->name('delete');
    Route::patch('/complated/{id}', [DailyController::class, 'updateComplated'])->name('update-complated');
});