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

    // Home route
    $routes->get('home', 'DashboardController::index');

    // Books routes
    $routes->get('books', 'BookController::index');
    $routes->get('books/view/(:segment)', 'BookController::view/$1');

    // Reviews route
    $routes->post('reviews/add', 'ReviewController::add');

    // Orders routes
    $routes->get('orders', 'OrderController::index');
    
    // Payment route
    $routes->get('orders/payment/(:num)', 'OrderController::payment/$1');
});
//routes end