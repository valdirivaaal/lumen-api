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

$app->get('/', function () use ($app) {
    return $app->version();
});

// Get all users data
$app->get('/users', 'UsersController@index');
// Get single data
$app->get('/users/{id}', 'UsersController@single');
// Posting user data
$app->post('/users', 'UsersController@posting');
// Delete data
$app->delete('/users/{id}', 'UsersController@delete');
// Update data
$app->put('/users/{id}', 'UsersController@update');
