<?php

use App\Http\Controllers\BaseController;
use App\Models\Product;
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

Route::controller(BaseController::class)->group(function () {
    foreach(array_keys(config('routes')) as $route) {
        Route::get($route.'/all', 'getAll');
        Route::get($route.'/filter', 'getFiltered');
        Route::get($route.'/search/{value}', 'search');
    }

});
