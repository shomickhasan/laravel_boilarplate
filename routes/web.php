<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ActivityController;

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
//=========  ROUTE FOR DASHBOARD  =======================
Route::middleware('auth')->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name('admin_dashboard');
});

//=========== ROUTE FOR ACCESS DASHBOARD FUNCTIONALITY=====
Route::middleware('auth')->prefix('admin')->group(function(){

    //------route for user---
    Route::get('/users',[UserController::class,'index'])->name('user.index');
    Route::get('/user-create',[UserController::class,'create'])->name('user.create');
    Route::post('/user-store',[UserController::class,'store'])->name('user.store');

    //route for user activity
    Route::get('/user_activity',[ActivityController::class,'index'])->name('activity.index');

    //route for auto complete
    Route::get('/auto-complete',[ActivityController::class,'auto'])->name('auto');
    Route::get('/search',[ActivityController::class,'search'])->name('search');

    //route for testing in add edid in same form

    Route::get('/add-edit-category/{id?}', [ActivityController::class, 'addEdit'])
        ->where('id', '.*')
        ->name('add-edit');

    Route::post('/store-update-category/{id?}', [ActivityController::class, 'storeUpdate'])
        ->where('id', '.*')
        ->name('store_update');

    Route::get('/category-index', [ActivityController::class, 'categoryIndex'])->name('cat_index');

});



/*Route::get('/',function (){
    return view('backend.pages.dashboard');
})->middleware('auth');*/

Route::get('/blank', function(){
    return view('backend.pages.blank');
})->name('blank');


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
