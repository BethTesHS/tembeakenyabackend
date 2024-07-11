<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use TCG\Voyager\Facades\Voyager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return Response::json([
        'name' => 'Abigail',
        'state' => 'CA'
    ]);
});
Route::get('/.well-known/assetlinks.json', function () {
    $jsonFilePath = resource_path('js/assetlinks.json');
    $jsonData = json_decode(file_get_contents($jsonFilePath), true);

    // Return the JSON data as a response
    return response()->json($jsonData);
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
