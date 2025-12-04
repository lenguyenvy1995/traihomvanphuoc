<?php

use Illuminate\Support\Facades\Route;
use Botble\Base\Facades\BaseHelper;
use Botble\Slug\Facades\SlugHelper;
use Botble\Language\Facades\Language; // nếu có plugin Language
use Botble\Obituary\Http\Controllers\PublicController;
use Botble\Obituary\Http\Controllers\CondolenceController;
use Botble\Obituary\Http\Controllers\ObituaryController;
use Botble\Obituary\Models\Obituary;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => BaseHelper::getAdminPrefix(),
    'middleware' => ['web', 'auth'],
], function () {
    Route::resource('obituary', ObituaryController::class)->names('obituary');
});


/*
|--------------------------------------------------------------------------
| Frontend Routes - SUPPORT MULTI LANGUAGE
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['web']], function () {

    // 🤝 Lấy prefix từ slug module (tự chuyển theo locale nếu dùng Language Advanced)
    $prefix = SlugHelper::getPrefix(Obituary::class) ?: 'cao-pho';

    // Nếu bật đa ngôn ngữ -> routes cần apply filter để load trong {locale}/
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () use ($prefix) {

        Route::get($prefix, [PublicController::class, 'index'])
            ->name('obituary.front.index');

        Route::get("$prefix/{slug}", [PublicController::class, 'show'])
            ->name('obituary.front.show');
    });
});


/*
|--------------------------------------------------------------------------
| Ajax / Submit Form
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['web']], function () {
    Route::post('obituary/condolence', [CondolenceController::class, 'store'])
        ->name('obituary.condolence.store');
});
