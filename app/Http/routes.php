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
//$app->get('/', 'AuthController@getLogin');
$app->post('/', 'AuthController@postLogin');
$app->get('/logout', 'AuthController@getLogout');

$app->get('/users', ['middleware' => 'auth', function (Request $request) {
    $user = Auth::user();
    return $user;

    $user = $request->user();
    return \App\User::all();

}]);


//Apps
$app->group(['prefix' => 'apps', 'namespace' => 'App\Http\Controllers'], function () use ($app) {
  $app->get('create', 'AppsController@create');
  $app->post('store', 'AppsController@store');

  $app->get('/', 'AppsController@index');

  $app->post('{id}', 'AppsController@destroy');

  $app->get('{id}/edit', 'AppsController@edit');
  $app->post('{id}/update', 'AppsController@update');
});
