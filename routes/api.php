<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HistoryController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



/*
 *     AUTH routes to LOG-IN,
 *     SIGN-UP AND LOG-OUT
 */
//Route::get('/',[PagesController::class, 'index']);

Route::post('login', [UsersController::class, 'login']);
Route::post('signup', [UsersController::class, 'signup']);
Route::middleware("auth:sanctum")->get("logout", [UsersController::class, "logout"]);
Route::middleware("auth:sanctum")->get("check_user", [UsersController::class, function(Request $request){
    return $request->user();
}]);
Route::get("getAllUsers", [UsersController::class, 'get']);


/*
 *
 *Here is the Qr Code Stuff>>>>>>> Almoste there almost
 *                            
 */
//Route::get("qr/", [QrCodeController::class, "index"]);
Route::post("qr/generate", [QrCodeController::class, "store"]);
Route::get("qr/scan/{hash}", [QrCodeController::class, "show"]);
Route::delete("qr/{hash}", [QrCodeController::class, "destroy"]);


/*
 *
 *Here goes the Favorites code
 *
 */
Route::middleware("auth:sanctum")
  ->get("favorite", [FavoriteController::class, "index"]);

Route::middleware("auth:sanctum")
  ->post("favorite", [FavoriteController::class, "store"]);

Route::middleware("auth:sanctum")
  ->get("favorite/{id}", [FavoriteController::class, "show"]);
//this the delete route
Route::middleware("auth:sanctum")
  ->post("favorite/{id}", [FavoriteController::class, "destroy"]);


/*
 *
 *Here goes the History code
 *
 */
Route::get("history", [HistoryController::class, "index"]);
Route::post("history", [HistoryController::class, "store"]);
Route::get("history/{id}", [HistoryController::class, "show"]);
Route::put("history/{id}", [HistoryController::class, "update"]);
Route::delete("his/{id}", [HistoryController::class, "delete"]);




