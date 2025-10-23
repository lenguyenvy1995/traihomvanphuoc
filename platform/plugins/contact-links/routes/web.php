<?php

use Botble\Base\Facades\AdminHelper;
use Botble\ContactLinks\Http\Controllers\ContactLinksController;
use Illuminate\Support\Facades\Route;

AdminHelper::registerRoutes(function () {
    Route::group(['prefix' => 'contact-links', 'as' => 'contact-links.'], function () {
        Route::resource('', ContactLinksController::class)->parameters(['' => 'contact-links']);
    });
});
