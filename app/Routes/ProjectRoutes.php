<?php

namespace Config;

$routes = Services::routes();

//routes start
$routes->group('project/', ['namespace' => 'App\Controllers\ProjectControllers'], static function ($routes) {
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::processRegister');
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::processLogin');
    $routes->get('logout', 'AuthController::logout');
    $routes->get('profile', 'AuthController::profile');

    //home route
    $routes->get('home', 'DashboardController::index');
});
//routes end