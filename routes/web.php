<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyImportController;
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


Route::get('company-import', [CompanyImportController::class, 'index'])->name('company.import.index'); 
Route::post('company-import', [CompanyImportController::class, 'store'])->name('company.import.store'); 
Route::get('progress/data', [CompanyImportController::class, 'progressResponse'])->name('c.progressResponse'); 
Route::get('progress', [CompanyImportController::class, 'progress'])->name('company.import.progress'); 
Route::get('companies', [CompanyImportController::class, 'companies'])->name('company.import.companies');
Route::post('companies/{id}', [CompanyImportController::class, 'companiesUpdate'])->name('company.import.update');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
