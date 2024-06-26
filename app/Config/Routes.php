<?php

use App\Controllers\Pages;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);

//$routes->resource('api/v1/cars');

$routes->resource('api/v1/cars', ['filter' => 'check_api_key']);
$routes->resource('keys/keys');

// $routes->get('home', [Pages::class, 'view']);

// $routes->get()