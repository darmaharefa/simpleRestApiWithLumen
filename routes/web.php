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

$router->get('/', function () use ($router) {
    return $router->app->version();
});



$router->get('/books','BookController@index');

$router->get('/books/{book_id}','BookController@show');

$router->post('/books','BookController@store');

$router->put('/books/{book_id}','BookController@update');

$router->delete('/books/{book_id}','BookController@delete');

