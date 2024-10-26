<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ROUTES HOME
$routes->get('/', 'Home:index');
$routes->get('/Home', 'Home::index'); // Main Page Routes
$routes->get('/(?!Settings|events|Sample|Tes)([a-zA-Z]+)', 'Home::$1'); // Sub Page Routes
$routes->get('/Berita/(:segment)', 'Home::isiBerita/$1'); // News Pages Routes

// ROUTES BERITA
$routes->match(['get', 'post'], '/Settings', 'Admin::index'); // Main Dashboard Routes
$routes->match(['get', 'post'], '/Settings/(:segment)', 'Admin::$1'); // Sub Dashboard Routes

$routes->post('Settings/updateVideo/(:num)', 'Admin::updateVideo/$1'); // Update Video Live Routes

$routes->get('/Settings/listBerita/(:segment)', 'Admin::viewBerita/$1'); // View Berita Routes


$routes->get('/Settings/updateJemaat/(:num)', 'Admin::updateJemaat/$1');
$routes->delete('/Settings/(:num)', 'Admin::deleteJemaat/$1');

$routes->post('Settings/updateEvent/(:num)', 'Admin::updateEvent/$1');
$routes->delete('Settings/deleteEvent/(:num)', 'Admin::deleteEvent/$1');



// Load FullCalendar Data
$routes->get('/events', 'Home::getEvents');


// Tes
$routes->get('/Tes', 'Tes::index');


$routes->setAutoRoute(true);
