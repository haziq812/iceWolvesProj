<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User;

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

Route::get('/create-roles', [RolesController::class, 'createRoles'])->name('roles.create');
Route::get('/assignRole', [RolesController::class, 'assignRole'])->name('roles.assign');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/assign-role/{user}', [AdminController::class, 'assignRole'])->name('admin.assign-role');
    Route::post('/admin/remove-role/{user}', [AdminController::class, 'removeRole'])->name('admin.remove-role');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

