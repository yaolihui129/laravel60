<?php

use Illuminate\Routing\Router;


Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    //版本号
    $router->resource('version', VersionController::class);
    $router->resource('integrate', IntegrateController::class);
    $router->resource('resource', ResourceController::class);

});
