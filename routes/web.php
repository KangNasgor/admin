<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/dashboard', function(){
    return view('admin/dashboard/dashboard');
})->name('dashboard');
Route::controller(RegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/register/proses', 'registerSubmit')->name('register.submit');
});
Route::controller(LoginController::class)->group(function() {
    Route::get('/', 'login')->name('login')->withoutMiddleware([AdminMiddleware::class]);
    Route::post('/login/proses', 'loginsubmit')->name('login.submit')->withoutMiddleware([AdminMiddleware::class]);
    Route::get('/logout', 'logout')->name('login.logout')->withoutMiddleware(AdminMiddleware::class);
});
Route::middleware(['admin'])->group( function () {
    Route::controller(CustomersController::class)->group(function () {
        Route::get('/customers', 'customers')->name('customers');
        Route::get('/customers/create', 'create')->name('customers.create');
        Route::post('/customers/create/update', 'store')->name('customers.update');
        Route::get('/customers/edit/{id}', 'edit')->name('customers.editpage');
        Route::put('/customers/softdelete/{id}', 'softdelete')->name('customers.softdelete');
        Route::put('/customers/edit/update/{id}', 'update')->name('customers.edit');    
        Route::get('/customers/restore/{id}', 'restore')->name('customers.restore');
        Route::delete('/customers/delete/{id}', 'delete')->name('customers.delete');
        Route::get('/customers/history', 'history')->name('customers.history');
    });    
});
