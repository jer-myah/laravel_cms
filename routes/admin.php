
<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group( function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');

    Route::get('/categories', [CategoryController::class, 'index'])->middleware('can:view-categories')->name('admin.categories.index');
    Route::get('/create-category', [CategoryController::class, 'create'])->middleware('can:view-categories')->name('admin.categories.create');
    Route::post('/create-category', [CategoryController::class, 'store'])->middleware('can:create-categories')->name('admin.categories.store');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->middleware('can:edit-categories')->name('admin.categories.edit');
    Route::put('/edit-category/{id}', [CategoryController::class, 'update'])->middleware('can:edit-categories')->name('admin.categories.update');
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->middleware('can:delete-categories')->name('admin.categories.destroy');

    Route::get('/pages', [PageController::class, 'index'])->middleware('can:view-pages')->name('admin.pages.index');
    Route::get('/create-page', [PageController::class, 'create'])->middleware('can:view-pages')->name('admin.create.page');
});