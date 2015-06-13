<?php

$app->group(['namespace' => 'App\Oleyh\Controllers\Web'], function ($app) {

    $app->get('/', ['as' => 'index', 'uses' => 'WebController@index']);
    $app->get('login', ['as' => 'login', 'uses' => 'WebController@login']);
    $app->post('login', ['as' => 'performLogin', 'uses' => 'WebController@performLogin']);
    $app->get('logout', ['as' => 'logout', 'uses' => 'WebController@performLogout']);
    $app->get('password/{password}', ['uses' => 'WebController@generateHash']);

});

$app->group(['prefix' => '/api/v1', 'namespace' => 'App\Oleyh\Controllers\Api'], function ($app) {

    $app->get('courts', ['uses' => 'CourtController@index']);

});
