<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


// Route::resource('companies', CompanyController::class);

Route::controller(CompanyController::class)->group(function () {
    Route::prefix('companies')->group(function () {
        Route::get('/', 'index')->name('companies.index');
        Route::get('/create', 'create')->name('companies.create');
        Route::post('/store', 'store')->name('companies.store');
        Route::get('/edit/{company}', 'edit')->name('companies.edit');
        Route::post('/update/{company}', 'update')->name('companies.update');
        Route::get('/destroy/{company}', 'destroy')->name('companies.destroy');
    });
});

