<?php

use Illuminate\Support\Facades\Route;
use Botble\ContactButtons\Http\Controllers\ContactButtonController;
use Botble\Base\Facades\BaseHelper;

Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'contact-buttons', 'as' => 'contact-buttons.'], function () {
        Route::get('/', [ContactButtonController::class, 'index'])->name('index');
        Route::get('/create', [ContactButtonController::class, 'create'])->name('create');
        Route::post('/create', [ContactButtonController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ContactButtonController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ContactButtonController::class, 'update'])->name('update');
        Route::delete('/{id}', [ContactButtonController::class, 'destroy'])->name('destroy');
    });
});