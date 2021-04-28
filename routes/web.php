<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

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

Route::get('/', [LinkController::class, 'redirect'])->name('home');

Route::get('/home', [LinkController::class, 'home']);

Route::get('/about', [LinkController::class, 'about'])->name('about');

Route::get('/contact', [LinkController::class, 'contact'])->name('contact');

Route::post('/contact',[LinkController::class, 'post'])->name('post');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/employees', [EmployeeController::class, 'employees'])->name('employees');
    Route::get('/companies', [CompanyController::class, 'companies'])->name('companies');
    Route::get('/details', [CompanyController::class, 'showCompanyDetails'])->name('details');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});



Route::post('/employees', [EmployeeController::class, 'addEmployee'])->name('addEmployee');

Route::post('/companies', [CompanyController::class, 'addCompany'])->name('addCompany');

Route::delete('/employees', [EmployeeController::class, 'deleteEmployee'])->name('deleteEmployee');

Route::put('/employees', [EmployeeController::class, 'updateEmployee'])->name('updateEmployee');

Route::delete('/companies', [CompanyController::class, 'deleteCompany'])->name('deleteCompany');

Route::put('/companies', [CompanyController::class, 'updateCompany'])->name('updateCompany');

Route::get('/register', [UserController::class, 'register'])->name('register');

Route::post('/register', [UserController::class, 'createUser'])->name('createUser');

Route::get('/login', [UserController::class, 'loginForm'])->name('loginForm');

Route::post('/login', [UserController::class, 'login'])->name('login');
