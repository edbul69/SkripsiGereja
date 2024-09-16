<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/Berita', 'Home::news');
$routes->get('/Sample', 'Home::sample');
$routes->get('/Tes', 'Tes::index');
$routes->get('/Baptisan', 'Home::baptisan');



$routes->setAutoRoute(true);
