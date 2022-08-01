<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PeopleController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\RealestateController;



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
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [PeopleController::class, 'display'])->name("people.display");
Route::post('/peoplestore', [PeopleController::class, 'store'])->name("people.store");

Route::get('/incomedisplay', [IncomeController::class, 'display'])->name("income.display");
Route::post('/incomestore', [IncomeController::class, 'store'])->name("income.store");

Route::get('/expensesdisplay/{id}', [ExpensesController::class, 'display'])->name("expenses.display");
Route::post('/expensesstore', [ExpensesController::class, 'store'])->name("expenses.store");

Route::get('/realestatedisplay/{id}', [RealestateController::class, 'display'])->name("realestate.display");

