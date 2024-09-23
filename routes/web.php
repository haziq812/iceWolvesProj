<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User;
use App\Http\Controllers\MenuController;

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

Auth::routes();


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/deactivedMenu', [AdminController::class, 'deactivedMenu'])->name('admin.deactivedMenu');
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/menusetting', [MenuController::class, 'menusetting'])->name('menu.menusetting');
    Route::post('/activedMenu/{menu}', [MenuController::class, 'activedMenu'])->name('menu.activedMenu');
    Route::post('/deactivedMenu/{menu}', [MenuController::class, 'deactivedMenu'])->name('menu.deactivedMenu');
    Route::post('/storeMenu', [MenuController::class, 'storeMenu'])->name('menu.storeMenu');
    Route::get('/create-roles', [RolesController::class, 'createRoles'])->name('roles.create');
    Route::get('/assignRole', [RolesController::class, 'assignRole'])->name('roles.assign');
    Route::get('/createMenu', [MenuController::class, 'createMenu'])->name('menu.assign');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/admin/assign-role/{user}', [AdminController::class, 'assignRole'])->name('admin.assign-role');
    Route::post('/admin/remove-role/{user}', [AdminController::class, 'removeRole'])->name('admin.remove-role');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/create-roles', [RolesController::class, 'createRoles'])->name('roles.create');
    Route::get('/assignRole', [RolesController::class, 'assignRole'])->name('roles.assign');
    Route::get('/createMenu', [MenuController::class, 'createMenu'])->name('menu.assign');
});





