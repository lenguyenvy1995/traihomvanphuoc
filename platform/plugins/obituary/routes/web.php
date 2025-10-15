<?php

use Illuminate\Support\Facades\Route;
use Botble\Base\Facades\BaseHelper;
use Botble\Obituary\Http\Controllers\ObituaryController;
use Botble\Obituary\Http\Controllers\CondolenceController;
use Botble\Obituary\Http\Controllers\PublicController;


/*
 * Admin routes
 */
Route::group([
    'prefix'     => BaseHelper::getAdminPrefix(),
    'middleware' => ['web', 'auth'],
], function () {
    Route::resource('obituary', ObituaryController::class)->names('obituary');
});

/*
 * Frontend routes
 */
Route::group(['middleware' => ['web']], function () {
    Route::get('/cao-pho', [PublicController::class, 'index'])->name('obituary.front.index');
    Route::get('/cao-pho/{slug}', [PublicController::class, 'show'])->name('obituary.front.show');
});
Route::group(['middleware' => ['web'], 'namespace' => 'Botble\Obituary\Http\Controllers'], function () {
    Route::post('obituary/condolence', [CondolenceController::class, 'store'])->name('obituary.condolence.store');
});