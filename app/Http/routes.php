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

$app->get('/', 'ApplicationsController@getLogin');