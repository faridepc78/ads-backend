<?php


use App\Http\Controllers\Api\V1\Common\Ad\AdController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1/common')
    ->name('api.v1.common.')
    ->group(function () {

        Route::apiResource(
            'ads',
            AdController::class
        )
            ->only(['index', 'show']);

    });
