<?php

$app->group(['prefix' => '/api/v1', 'namespace' => 'App\Oleyh\Controllers\Api'], function ($app) {

    $app->get('courts', ['uses' => 'CourtController@index']);

});
