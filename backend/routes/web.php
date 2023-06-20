<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

// $router->group(['middleware' => 'client.credentials'], function () use ($router) {
    /**
     *Routes for NewsApiController 
    */
    $router->get('/pull-news-api', 'NewsApiController@index');
    $router->post('/pull-news-api', 'NewsApiController@store');
    
// });