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

$router->get('/version2', function () use ($router) {
    return $router->app->version();
});

$router->get('/version3', function () use ($router) {
    return $router->app->version();
});

$router->get('/version4', function () use ($router) {
    return $router->app->version();
});

$router->get('getData','TestController@index');
$router->get('getParameter/{name}','TestController@parameter');
$router->get('getParameterRequest','TestController@parameterRequest');

$router->group(['prefix' => 'job'], function () use ($router) {
    $router->get('{id_job}',function($id_job) {
        return $id_job;
    });
    $router->get('{id_job}/status',function ($id_job) {
        return "Status job " . $id_job;
    });
    $router->get('{id_job}/progress', function ($id_job) {
        return "Progress job " . $id_job;
    });
    $router->post('{id_job}/create',function($id_job) {
        return "Create job " . $id_job;
    });
    $router->post('{id_job}/update',function($id_job){
        return "Update job " . $id_job;
    });
    $router->post('{id_job}/start',function($id_job){
        return "Start job " . $id_job;
    });
    $router->post('{id_job}/finish',function($id_job){
        return "Finish job " . $id_job;
    });
});

$router->group(['prefix' => 'user'], function () use ($router) {
    $router->get('login','UserController@login');
    $router->get('testKey','UserController@testKey');
    $router->get('status', [
        'middleware' => 'auth',
        'uses' => 'TestController@getUser'
    ]);
});

$router->group(['prefix' => 'ticketing'], function() use ($router) {
    $router->get('{id_ticket}',function($id_ticket){
        echo "ID Ticket Summary = " . $id_ticket;
    });

    $router->get('{id_ticket}/detail','TicketingController@detail');

    $router->group(['prefix' => 'open'], function() use ($router) {
        $router->get('reserve','TicketingController@openReserve');
        $router->get('parameter','TicketingController@openParameter');
        $router->get('parameterDetail','TicketingController@openParameterDetail');
        $router->post('createReserve','TicketingController@openCreateReserve');
        $router->put('updateReserve','TicketingController@openUpdateReserve');
        $router->get('emailParameter','TicketingController@openEmailParameter');
        $router->get('emailTemplate','TicketingController@openEmailTemplate');
        $router->post('emailSend','TicketingController@openEmailSend');
    });

    $router->group(['prefix' => 'pending'], function() use ($router) {
        $router->get('show','TicketingController@pendingShow');
        $router->get('data','TicketingController@pendingData');
        $router->get('emailParameter','TicketingController@pendingEmailParameter');
        $router->get('emailTemplate','TicketingController@pendingEmailTemplate');
        $router->post('emailSend','TicketingController@pendingEmailSend');
        $router->put('update','TicketingController@pendingUpdate');
    });

    $router->group(['prefix' => 'cancel'], function() use ($router) {
        $router->get('data','TicketingController@cancelData');
        $router->get('emailParameter','TicketingController@cancelEmailParameter');
        $router->get('emailTemplate','TicketingController@cancelEmailTemplate');
        $router->post('emailSend','TicketingController@cancelEmailSend');
    });

    $router->group(['prefix' => 'close'], function() use ($router) {
        $router->get('data','TicketingController@closeData');
        $router->get('emailParameter','TicketingController@closeEmailParameter');
        $router->get('emailTemplate','TicketingController@closeEmailTemplate');
        $router->post('emailSend','TicketingController@closeEmailSend');
    });
});
