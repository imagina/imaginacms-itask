<?php

use Illuminate\Routing\Router;

Route::group(['prefix' =>'/itask/v1'], function (Router $router) {
    $router->apiCrud([
      'module' => 'itask',
      'prefix' => 'tasks',
      'controller' => 'TaskApiController',
      //'middleware' => ['create' => [], 'index' => [], 'show' => [], 'update' => [], 'delete' => [], 'restore' => []]
    ]);
    $router->apiCrud([
      'module' => 'itask',
      'prefix' => 'statuses',
      'controller' => 'StatusApiController',
      //'middleware' => ['create' => [], 'index' => [], 'show' => [], 'update' => [], 'delete' => [], 'restore' => []]
    ]);
    $router->apiCrud([
      'module' => 'itask',
      'prefix' => 'categories',
      'controller' => 'CategoryApiController',
      'middleware' => ['create' => [], 'index' => [], 'show' => [], 'update' => [], 'delete' => [], 'restore' => []]
    ]);
    $router->apiCrud([
      'module' => 'itask',
      'prefix' => 'priorities',
      'controller' => 'PriorityApiController',
      //'middleware' => ['create' => [], 'index' => [], 'show' => [], 'update' => [], 'delete' => [], 'restore' => []]
    ]);
    $router->apiCrud([
      'module' => 'itask',
      'prefix' => 'timelogs',
      'controller' => 'TimelogApiController',
      //'middleware' => ['create' => [], 'index' => [], 'show' => [], 'update' => [], 'delete' => [], 'restore' => []]
    ]);
// append





});
