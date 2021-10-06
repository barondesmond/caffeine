<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Drinks;
use App\Http\Resources\DrinkResource;

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


Route::get('/drink', function () {
    return DrinkResource::collection(Drinks::all());
});
