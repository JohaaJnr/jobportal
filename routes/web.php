<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Jobs;
use App\Models\User;

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
    $jobs = Jobs::all();
   $categories = Category::all();
   
    return view('home' , compact('jobs', 'categories'));
});

Route::get('/register', function(){
    return view('register');
});

Route::post('/create_user', [UserController::class, 'register'])->name('signup');

Route::get('/login', function(){
    return view('login');
})->middleware('ensureuser')->name('login');

Route::post('/auth', [UserController::class, 'login'])->name('signin');

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/post/jobs', function(){ 
    $categories = Category::all();
  
    return view('jobs')->with('categories', $categories); 
})->middleware('auth');

Route::post('/new/job', [UserController::class, 'postjob'])->name('newjob')->middleware('auth');

Route::get('/create/new', function(){ return view('category'); })->middleware('auth');

Route::post('/newcat', [UserController::class, 'newcat'] )->name('newcategory')->middleware('auth');