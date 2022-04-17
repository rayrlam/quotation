<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\QuoteV1Controller;
use App\Http\Controllers\Api\V2\QuoteV2Controller;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix'=>'v1'], function(){
    Route::post('/quoting', [QuoteV1Controller::class, 'quoting'])->name('quoting');
});

Route::group(['prefix'=>'v2'], function(){
    Route::post('/quoting', [QuoteV2Controller::class, 'quoting'])->name('quoting');
});
