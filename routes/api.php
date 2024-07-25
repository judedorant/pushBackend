<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Ldap\LoginAuth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your apphpplication. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    // return "test";
});
Route::get('/token', function (Request $request){
    // return "test";
    // return response()->json(['csrf-cookie' => csrf_token()]);
});
Route::get('/users', [LoginAuth::class, 'getusers']);

// ->middleware('')

// Route::group(['middleware' => ['guest', 'LogHeaders']], function () {
    Route::post('/login', [LoginAuth::class, 'authLdap']);
    // Route::post('/login', function (Request $request) {
    // // Route::post('authentication', ['as' => 'authentication_ldap', 'uses' => 'Ldap\LoginAuth@authLdap']);

    //     return response()->json([
    //         'success' => true,
    //         'ous' => "this is get",
    //         'users' => $request->ntlogin,
    //         'announcements' => "announcesment",
    //         'errors' => false
    //     ], 200);
    // });
// });
