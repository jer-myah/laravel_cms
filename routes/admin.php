
<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryPageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware('auth')->group( function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::put('/users/update-role', [UserController::class, 'updateRole'])->name('admin.user_role.update');

    Route::get('/categories', [CategoryController::class, 'index'])->middleware('can:view-categories')->name('admin.categories.index');
    Route::get('/create-category', [CategoryController::class, 'create'])->middleware('can:view-categories')->name('admin.categories.create');
    Route::post('/create-category', [CategoryController::class, 'store'])->middleware('can:create-categories')->name('admin.categories.store');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->middleware('can:edit-categories')->name('admin.categories.edit');
    Route::put('/edit-category/{id}', [CategoryController::class, 'update'])->middleware('can:edit-categories')->name('admin.categories.update');
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->middleware('can:delete-categories')->name('admin.categories.destroy');

    Route::get('/pages', [PageController::class, 'index'])->middleware('can:view-pages')->name('admin.pages.index');
    Route::get('/create-page', [PageController::class, 'create'])->middleware('can:view-pages')->name('admin.pages.create');
    Route::post('/create-page', [PageController::class, 'store'])->middleware('can:create-pages')->name('admin.pages.store');
    Route::get('/edit-page/{id}', [PageController::class, 'edit'])->middleware('can:edit-pages')->name('admin.pages.edit');
    Route::put('/edit-page/{id}', [PageController::class, 'update'])->middleware('can:edit-pages')->name('admin.pages.update');
    Route::post('/upload', [PageController::class, 'uploadImage'])->middleware('can:create-pages')->name('ckeditor.upload');
    Route::get('/show-page/{id}', [PageController::class, 'show'])->middleware('can:view-pages')->name('admin.pages.show');
    Route::get('/delete-page/{id}', [PageController::class, 'destroy'])->middleware('can:view-pages')->name('admin.pages.destroy');

    Route::post('/assign-page-category', [CategoryPageController::class, 'store'])->middleware('can:create-pages')->name('admin.category_page.assign');
});