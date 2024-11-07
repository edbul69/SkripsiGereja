<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ROUTES HOME
$routes->get('/', 'Home::index');
$routes->get('/Home', 'Home::index'); // Main Page Routes
$routes->get('/(?!Settings|events|Sample|Tes)([a-zA-Z]+)', 'Home::$1'); // Sub Page Routes
$routes->get('/Berita/(:segment)', 'Home::isiBerita/$1'); // News Pages Routes

// ROUTES ADMIN
$routes->match(['get', 'post'], '/Settings', 'Admin::index'); // Main Dashboard Routes
$routes->match(['get', 'post'], '/Settings/(:segment)', 'Admin::$1'); // Sub Dashboard Routes

$routes->post('Settings/updateVideo/(:num)', 'Admin::updateVideo/$1'); // Update Video Live Routes

$routes->get('/Settings/jemaat/edit/(:num)', 'Admin::editJemaat/$1'); // View Edit Jemaat
$routes->delete('/Settings/jemaat/delete/(:num)', 'Admin::deleteJemaat/$1'); // Delete Jemaat
$routes->post('/Settings/jemaat/update/(:num)', 'Admin::updateJemaat/$1'); // Edit Jemaat
$routes->get('admin/get-cities', 'Admin::getCities'); // API Kota
$routes->get('admin/get-kecamatan/(:segment)', 'Admin::getKecamatan/$1'); // API Kecamatan
$routes->get('admin/get-kelurahan/(:segment)', 'Admin::getKelurahan/$1'); // API Kelurahan

$routes->match(['delete', 'post'], '/Settings/ibadah/delete/(:num)', 'Admin::deleteIbadah/$1'); // Delete Ibadah
$routes->post('/Settings/ibadah/update/(:num)', 'Admin::updateIbadah/$1'); // Edit Ibadah

$routes->get('/Settings/berita/edit/(:segment)', 'Admin::editBerita/$1'); // View Edit Berita
$routes->get('/Settings/berita/list/(:segment)', 'Admin::detailBerita/$1'); // View Detail Berita
$routes->delete('/Settings/berita/hapus/(:num)', 'Admin::deleteBerita/$1'); // Delete Berita
$routes->post('/Settings/berita/update/(:num)', 'Admin::updateBerita/$1'); // Edit Berita
$routes->get('/Settings/berita/preview', 'Admin::previewBerita'); // Preview Berita

$routes->delete('/Settings/akses/delete/(:segment)', 'Admin::deleteAkses/$1'); // Hapus Akses
$routes->get('/Settings/akses/edit/(:segment)', 'Admin::editAkses/$1'); // View Edit Akses
$routes->post('/Settings/akses/update/(:segment)', 'Admin::updateAkses/$1'); // Update Akses

// Load FullCalendar Data
$routes->get('/events', 'Home::getEvents');

// Tes
$routes->get('/Tes', 'Tes::index');


$routes->setAutoRoute(true);
