<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\Api\WebcamsApiController;

Route::middleware(['cors'])->group(function () {

    /** Webcams Routes */
    Route::get('webcams',[WebcamsApiController::class,'index']);

});