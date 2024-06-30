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

    // Categories routes
    $routes->get('categories', 'BookController::categories');
    $routes->get('category/(:num)', 'BookController::category/$1');

    // About routes
    $routes->get('about', 'AboutController::index');

    //Search routes
    $routes->get('search', 'SearchController::index');

    //Cart routes
    $routes->get('cart', 'CartController::index');
    $routes->post('cart/add', 'CartController::addToCart');
    $routes->post('cart/remove', 'CartController::removeFromCart');
    $routes->post('cart/buy', 'CartController::buy');
    $routes->get('cart/payment', 'CartController::payment');
    $routes->post('cart/processPayment', 'CartController::processPayment');
    
    //Profie routes
    $routes->get('profile', 'AuthController::profile');
});