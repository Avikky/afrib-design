<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\myAuth\LoginController;
use App\Http\Controllers\StoryController;
 
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

// Route::get('/', function () {
//     return view('index');
// });

//general user page routes unauthenticated
Route::get('/', [PageController::class, 'index'])->name('home');


Route::get('/account/access/{username}', [LoginController::class, 'loginUser'])->name('login.user');
Route::get('/view/{slug}', [PageController::class, 'viewStory'])->name('view.story');
Route::get('/all-story', [PageController::class, 'allStory'])->name('all.story');

Route::group(['prefix' => 'account', 'middleware' => ['auth', 'isuser']], function()
{
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/stories', [StoryController::class, 'index'])->name('stories');
    Route::get('/categories', [StoryController::class, 'category'])->name('categories');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    


    Route::post('/create', [StoryController::class, 'create'])->name('create.story');

    Route::post('/edit/{id}', [StoryController::class, 'edit'])->name('edit.story');
    Route::get('/show/{slug}', [StoryController::class, 'show'])->name('show.story');
    Route::delete('/delete/{id}', [StoryController::class, 'destroy'])->name('delete.story');

    Route::post('/profile/{id}', [DashboardController::class, 'updateProfile'])->name('update.profile');
   
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isadmin']], function()
{
    Route::get('/home', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/category', [AdminController::class, 'category'])->name('admin.category');
    Route::get('/location', [AdminController::class, 'location'])->name('admin.location');
    Route::get('/stories', [StoryController::class, 'index'])->name('admin.stories');

    Route::post('/approve/{id}', [StoryController::class, 'approveStory'])->name('approve.story');
    Route::post('/reject/{id}', [StoryController::class, 'rejectStory'])->name('reject.story');

    Route::post('/delete/{id}', [StoryController::class, 'destroy'])->name('del.story');


    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
 
    Route::post('/create-category', [AdminController::class, 'createCategory'])->name('create.category');
    Route::delete('/delete-category/{id}', [AdminController::class, 'deleteCategory'])->name('delete.category');
    Route::delete('/delete-location/{id}', [AdminController::class, 'deleteLocation'])->name('delete.location');

    Route::post('/create-location', [AdminController::class, 'createLocation'])->name('create.location');

    Route::get('/profile', [DashboardController::class, 'profile'])->name('admin.profile');
    Route::post('/profile/{id}', [DashboardController::class, 'updateProfile'])->name('update.profile');
    Route::post('/password-change', [AdminController::class, 'changePassword'])->name('update.password'); 

});



require __DIR__.'/auth.php';
