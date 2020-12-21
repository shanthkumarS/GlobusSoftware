<?php

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('admin')->group(function () {

    Route::middleware(['auth:admin'])->group(function () {
        
        Route::get('/dashboard', [EmployeeController::class, 'index'])->name('admin.dashboard.index');
        
        Route::delete('/logout', [AdminLoginController::class, 'destroy'])->name('admin.logout');
    
    });

    Route::middleware(['guest:admin'])->group(function () {
        
        Route::get('/login', function () {
            return view('admin.login');
        })->name('admin.login');

        Route::post('/authenticate', [AdminLoginController::class, 'store'])->name('admin.authenticate');
    });

});

Route::middleware(['auth:admin'])->group(function () {
    
    Route::get('/employee/show/{id}', [EmployeeController::class, 'show'])->name('employee.show');
    
    Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    
    Route::post('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    
    Route::delete('/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.delete');
    
    Route::get('/employee/report/dowload', [EmployeeController::class, 'downloads'])->name('employee.export');
});


