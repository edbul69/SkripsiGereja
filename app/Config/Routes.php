<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/Home', 'Home::index');
$routes->get('/(?!Settings|events|Sample|Tes)([a-zA-Z]+)', 'Home::$1');
$routes->get('/Berita/(:segment)', 'Home::Detail/$1');
$routes->get('/Tes', 'Tes::index');
$routes->match(['get', 'post'], '/Settings', 'Admin::index');
$routes->match(['get', 'post'], '/Settings/(:segment)', 'Admin::$1');
$routes->get('/Settings/editJemaat/(:num)', 'Admin::editJemaat/$1');
$routes->get('/Settings/deleteJemaat/(:num)', 'Admin::deleteJemaat/$1');
$routes->post('Settings/updateEvent/(:num)', 'Admin::updateEvent/$1');
$routes->delete('Settings/deleteEvent/(:num)', 'Admin::deleteEvent/$1');
$routes->post('Settings/updateVideo/(:num)', 'Admin::updateVideo/$1');




// Load FullCalendar Data
$routes->get('/events', 'Home::getEvents');



$routes->setAutoRoute(true);
