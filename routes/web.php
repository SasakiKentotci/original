<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IngredientsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipesController; 
use App\Http\Controllers\UsersController; 
use App\Http\Controllers\CategoryController;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard; 
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

Route::get('/',[DashboardController::class, 'index'] )->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard',[DashboardController::class, 'index'] )->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('recipes', RecipesController::class);
Route::middleware('auth')->group(function () {
    Route::resource('users', UsersController::class, ['only' => ['index', 'show']]);
    Route::resource('ingredients', IngredientsController::class);
    Route::resource('category', CategoryController::class);
});

require __DIR__.'/auth.php';
