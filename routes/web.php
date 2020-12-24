<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;

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
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::prefix('admin')->group(function () {

    Route::middleware(['auth:admin'])->group(function () {
        
        Route::get('users/list', [EmployeeController::class, 'index'])->name('list.users');

        Route::get('post/list', [PostController::class, 'index'])->name('admin.posts.list');
        
        Route::post('/post', [AdminLoginController::class, 'destroy'])->name('admin.logout');

        Route::post('/post', [AdminLoginController::class, 'destroy'])->name('admin.logout');

        Route::get('/post/banned/{postId}', [PostController::class, 'bannedUsers'])->name('banned.users');
    
    });

    Route::middleware(['guest:admin'])->group(function () {
        
        Route::get('/login', function () {
            return view('admin.login');
        })->name('admin.login');

        Route::post('/authenticate', [AdminLoginController::class, 'store'])->name('admin.authenticate');

        Route::post('', []); 
    });
});


Route::middleware(['auth:web'])->group(function () {

    Route::get('post/list', [PostController::class, 'list'])->name('user.posts.list');
    
    Route::post('post/create', [PostController::class, 'create'])->name('post.create');

    Route::get('post/create', [PostController::class, 'create'])->name('post.create');

    Route::post('post/store/{user_id}', [PostController::class, 'store'])->name('post.store');

    Route::post('comment/add/{userId}/{postId}', [CommentController::class, 'add'])->name('comment.add');

});


Route::middleware(['auth:web,admin'])->group(function () {

    Route::prefix('employee')->group(function () {

        Route::get('/show/{id}', [EmployeeController::class, 'show'])->name('employee.show');

        Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
        
        Route::post('/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
        
        Route::delete('/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
        
        Route::get('/report/dowload', [EmployeeController::class, 'downloads'])->name('employee.export');
    
    });

    Route::prefix('post')->group(function () {
        
        Route::get('/show/{id}', [PostController::class, 'show'])->name('post.show');
    
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
        
        Route::post('/update/{id}', [PostController::class, 'update'])->name('post.update');
        
        Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');

    });

    Route::prefix('comment')->group(function () {

        Route::get('/show/{id}', [CommentsController::class, 'show'])->name('comment.show');
    
        Route::get('/edit/{id}', [CommentsController::class, 'edit'])->name('comment.edit');
        
        Route::post('/update/{id}', [CommentsController::class, 'update'])->name('comment.update');
        
        Route::delete('/delete/{id}', [CommentsController::class, 'destroy'])->name('comment.delete');
        
        Route::get('/report/dowload', [CommentsController::class, 'downloads'])->name('comment.export');

    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});