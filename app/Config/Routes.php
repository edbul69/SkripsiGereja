<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ROUTES HOME
$routes->get('/', 'Home::index');
// $routes->get('/Home', 'Home::index'); // Main Page Routes
// $routes->get('/(?!Dashboard|events|Sample|Tes|login|logout)([a-zA-Z]+)', 'Home::$1'); // Sub Page Routes
// $routes->get('/Berita/(:segment)', 'Home::isiBerita/$1'); // News Pages Routes

// ROUTES ADMIN
$routes->get('/login', 'Auth::index'); // Login Routes
$routes->get('/logout', 'Auth::logout'); // Logout Routes
$routes->post('/login/auth', 'Auth::login'); // Login Action Routes

$routes->group('Dashboard', ['filter' => 'adminfilter'], function ($routes) {
    $routes->match(['get', 'post'], '/', 'Admin::index');
    $routes->match(['get', 'post'], '(:segment)', 'Admin::$1');
    $routes->post('updateVideo/(:num)', 'Admin::updateVideo/$1');
    $routes->get('jemaat/edit/(:num)', 'Admin::editJemaat/$1');
    $routes->delete('jemaat/delete/(:num)', 'Admin::deleteJemaat/$1');
    $routes->post('jemaat/update/(:num)', 'Admin::updateJemaat/$1');
    $routes->match(['delete', 'post'], 'ibadah/delete/(:num)', 'Admin::deleteIbadah/$1');
    $routes->post('ibadah/update/(:num)', 'Admin::updateIbadah/$1');
    $routes->get('berita/edit/(:segment)', 'Admin::editBerita/$1');
    $routes->get('berita/list/(:segment)', 'Admin::detailBerita/$1');
    $routes->delete('berita/delete/(:num)', 'Admin::deleteBerita/$1');
    $routes->post('berita/update/(:num)', 'Admin::updateBerita/$1');
    $routes->get('berita/preview', 'Admin::previewBerita');
    $routes->delete('akses/delete/(:segment)', 'Admin::deleteAkses/$1');
    $routes->get('akses/edit/(:segment)', 'Admin::editAkses/$1');
    $routes->post('akses/update/(:segment)', 'Admin::updateAkses/$1');
});

$routes->get('admin/get-cities', 'Admin::getCities'); // API Kota
$routes->get('admin/get-kecamatan/(:segment)', 'Admin::getKecamatan/$1'); // API Kecamatan
$routes->get('admin/get-kelurahan/(:segment)', 'Admin::getKelurahan/$1'); // API Kelurahan
$routes->get('/events', 'Home::getEvents');

// Tes
// $routes->get('/Tes', 'Tes::index');
