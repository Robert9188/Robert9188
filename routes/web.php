<?php

use Illuminate\Support\Facades\Route;

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

Route::get('rendez-vous', [\App\Http\Controllers\ReservationController::class, 'index'])->name('rendez-vous.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::multiauth('Employee', 'employee');

Route::middleware(['auth:employee'])->prefix('employee')->name('employee.')->group(function (){
    Route::get('reservations', [\App\Http\Controllers\ReservationController::class, 'allReservations'])->name('reservations');
    Route::get('profiles', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('profiles');
    Route::get('profile/create', [\App\Http\Controllers\EmployeeController::class, 'create'])->name('profile.create')->middleware('role:admin');
    Route::post('profile/store', [\App\Http\Controllers\EmployeeController::class, 'store'])->name('profile.store')->middleware(['role:admin']);

//    Roles and Permission
    Route::get('roles-permissions', [\App\Http\Controllers\RolePermissionController::class, 'index'])->name('roles-permissions')->middleware('role:admin');

//    Roles
    Route::get('role/create', [\App\Http\Controllers\RoleController::class, 'create'])->name('role.create')->middleware('role:admin');
    Route::post('role/store', [\App\Http\Controllers\RoleController::class, 'store'])->name('role.store')->middleware('role:admin');
    Route::get('role/edit/{role}', [\App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit')->middleware('role:admin');
    Route::get('role/update/{role}', [\App\Http\Controllers\RoleController::class, 'update'])->name('role.update')->middleware('role:admin');

//    Permissions
    Route::get('permission/create', [\App\Http\Controllers\PermissionController::class, 'create'])->name('permission.create')->middleware('role:admin');
    Route::post('permission/store', [\App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store')->middleware('role:admin');
    Route::get('permission/edit/{permission}', [\App\Http\Controllers\PermissionController::class, 'edit'])->name('permission.edit')->middleware('role:admin');
    Route::post('permission/update/{permission}', [\App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update')->middleware('role:admin');

});
