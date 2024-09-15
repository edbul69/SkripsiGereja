<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/Berita', 'Home::news');
$routes->get('/Tes', 'Tes::index');


$routes->setAutoRoute(true);
