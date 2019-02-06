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
    return env('APP_NAME');
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'v1'], function () use ($router) {
        $router->get('/pulsa', 'PulsaController@terminal');
        $router->get('/bpjskes', 'BpjskesController@terminal');
        $router->get('/etoll', 'EtollController@terminal');
        $router->get('/gopay', 'GopayController@terminal');
        $router->get('/grabovo', 'GrabOvoController@terminal');
        $router->get('/multifinance', 'MultifinanceController@terminal');
        $router->get('/pdam', 'PdamController@terminal');
        $router->get('/pgn', 'PgnController@terminal');
        $router->get('/pln', 'PlnController@terminal');
        $router->get('/telkom', 'TelkomController@terminal');
        $router->get('/vcgame', 'VoucherGameController@terminal');
        $router->get('/kai', 'KaiController@terminal');
        $router->get('/travel', 'TravelController@terminal');
    });
});