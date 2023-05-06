<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| Routes are what your application does on a certain action
*/

/*
 * */
//default route
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [TodoListController::class, 'index']);

/*
 point this at the controller and add the method so it knows what to do when this route is accessed */
Route::post('/saveItem', [TodoListController::class, 'saveItem'])->name('saveItem');

Route::post('/markCompleteRoute/{id}', [TodoListController::class, 'markComplete'])->name('markComplete');
