<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// Authentication routes
$app->get('/', 'AuthController@getLogin');
$app->post('/', 'AuthController@postLogin');
$app->get('/logout', 'AuthController@getLogout');

$app->get('/users', ['middleware' => 'auth', function (Request $request) {
    $user = Auth::user();
    return $user;

    $user = $request->user();
    return \App\User::all();

}]);

//Apps
$app->get('/apps/create', 'AppsController@create');
$app->post('/apps/store', 'AppsController@store');

$app->get('/apps', 'AppsController@index');

$app->post('/apps/{id}', 'AppsController@destroy');

$app->get('/apps/{id}/edit', 'AppsController@edit');
$app->post('/apps/{id}/update', 'AppsController@update');