<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use CodeIgniter\Router\RouteGroup;

$routes = Services::routes();

$routes->group('project/', ['namespace' => 'App\Controllers\ProjectControllers'], static function ($routes) {
    // Authentication routes
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::processRegister');
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::processLogin');
    $routes->get('logout', 'AuthController::logout');
    $routes->get('profile', 'AuthController::profile');

    // Dashboard route
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

    // Categories routes
    $routes->get('categories', 'BookController::categories');
    $routes->get('category/(:num)', 'BookController::category/$1');


    // About routes
    $routes->get('about', 'AboutController::index');
});
