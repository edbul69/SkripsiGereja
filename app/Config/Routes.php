<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/Backup', 'Backup::index');
$routes->get('/Baru', 'Baru::index');



$routes->setAutoRoute(true);
