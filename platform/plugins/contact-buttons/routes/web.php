<?php

use Illuminate\Support\Facades\Route;
use Botble\Base\Facades\BaseHelper;
use Botble\ContactButtons\Http\Controllers\ContactButtonController;


Route::group([
   'prefix'     => BaseHelper::getAdminPrefix(),
   'middleware' => ['web', 'auth'],
], function () {
   Route::resource('contact-buttons', ContactButtonController::class)->names('contact-buttons');
});