<?php

use App\Http\Controllers\ProfileController;


use Illuminate\Support\Facades\Route;


// * User defined
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\DepartmentController;

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

Route::get('/livewire', function () {
    return view('test.main');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// * The admin page, uses middleware `auth` to check if the user is logged in, and uses the `isAdmin` middleware to check if the user is and admin
// * Prefixes the admin group with `/admin` to make it easier to create new groups and also prefix those all withing the `/admin` page
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard', [
            'users' => \App\Models\User::paginate(5, ['*'], 'user')->withQueryString(),
            'departments' => \App\Models\Department::paginate(5, ['*'], 'department')->withQueryString(),
        ]);
    })->name('admin.dashboard');


    // * The user group, prefixed with `/user` and using middleware, `web`, `auth` and `isAdmin`
    Route::controller(UserController::class)->prefix('user')->group(function () {
        // * Gets all the users
        Route::get('/', 'index');

        // * Gets a single user
        Route::get('/{id}', 'show')->name('admin.user.show');

        // * Updates a user (back-end)
        Route::put('/{id}/edit', 'store')->name('admin.user.edit');

        // Route::put('/{id}/password', 'passwordReset')->name('admin.user.password.reset');

        Route::get('search', 'search')->name('admin.user.search');

    });


    // * Groups a controller to multiple routes using the same prefix for all routes
    Route::controller(DepartmentController::class)->prefix('department')->group(function () {

        // * Returns all the departments
        Route::get('/', 'index');

        // * Returns specific department using the given id
        Route::get('/{id}', 'show')->name('admin.department.show');

        Route::put('/{id}/edit', 'store')->name('admin.department.edit');

        Route::delete('/{id}/destroy', 'destroy')->name('admin.department.destroy');

    });
});
require __DIR__.'/auth.php';
