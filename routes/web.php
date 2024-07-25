<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::middleware('LogHeaders')->get('/sanctum/csrf-cookie', function (Request $request) {
//     return response()->json(['csrf-cookie' => csrf_token()]);
// });

// Route::group(['middleware' => 'LogHeaders'], function () {
//     Route::post('/login', function (Request $request) {
//         return response()->json([
//             'success' => true,
//             'ous' => "this is get",
//             'users' => "ous",
//             'announcements' => "announcesment",
//             'errors' => false
//         ], 200);
//     });
// });
Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__.'/auth.php';
