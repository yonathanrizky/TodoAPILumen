<?php
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
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

## Route get all data
$router->get('/{controller}', function($controller){
    $controller = ucwords($controller);
    return app('App\Http\Controllers\\'.$controller)->index();
});

## Route get data by Id
$router->get('/{controller}/{id}', function($controller, $id){
    $controller = ucwords($controller);
    return app('App\Http\Controllers\\'.$controller)->show($id);
});

## Route post data (create)
$router->post('/{controller}', function(Request $request, $controller){
    $controller = ucwords($controller);
    return app('App\Http\Controllers\\'.$controller)->store($request);
});

## Route put data by id
$router->put('/{controller}/{id}', function(Request $request, $controller, $id){
    $controller = ucwords($controller);
    return app('App\Http\Controllers\\'.$controller)->update($request, $id);
});

## Route delete data by id
$router->delete('/{controller}/{id}', function($controller, $id){
    $controller = ucwords($controller);
    return app('App\Http\Controllers\\'.$controller)->destroy($id);
});