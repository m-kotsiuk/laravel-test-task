<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group([
    'middleware' => 'auth'
], function () {

    Route::resource('employees', EmployeeController::class, [
        'except' => 'show'
    ]);

    Route::group([
        'prefix' => 'employees',
        'as' => 'employees.'
    ], function () {

        Route::get('data', [EmployeeController::class, 'getTables'])
            ->name('data');

        Route::get('autocomplete', [EmployeeController::class, 'getAutoCompleteData'])
            ->name('autocomplete');
    });

    Route::resource('positions', PositionController::class, [
        'except' => 'show'
    ]);

    Route::group([
        'prefix' => 'positions',
        'as' => 'positions.'
    ], function () {

        Route::get('/data', [PositionController::class, 'getTables'])
            ->name('data');

        Route::get('/autocomplete', [PositionController::class, 'getAutoCompleteData'])
            ->name('autocomplete');
    });


});





