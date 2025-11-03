<?php

use Botble\Base\Facades\AdminHelper;
use Botble\Tivatechbuttons\Http\Controllers\TivatechbuttonsController;
use Illuminate\Support\Facades\Route;

AdminHelper::registerRoutes(function () {
    Route::group(['prefix' => 'tivatechbuttons', 'as' => 'tivatechbuttons.'], function () {
        Route::resource('', TivatechbuttonsController::class)->parameters(['' => 'tivatechbuttons']);
    });
});
