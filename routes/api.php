<?php

use App\Http\Controllers\Api\WorkController;
use App\Http\Controllers\Api\LeadController;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')
        ->prefix('works')
        ->group(function(){
            Route::get('/',[WorkController::class, 'index']);
            Route::get('/types',[WorkController::class, 'getTypes']);
            Route::get('/technologies',[WorkController::class, 'getTechnologies']);
            Route::get('/work-type/{id}',[WorkController::class, 'getWorksByType']);
            Route::get('/work-technology/{id}',[WorkController::class, 'getWorksByTechnology']);
            Route::get('/{slug}',[WorkController::class, 'getWorkDetail']);
            Route::get('/search/{tosearch}',[WorkController::class, 'search']);
        });

Route::post('/contacts', [LeadController::class, 'store']);
