<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/Home', 'Home::index');
// $routes->get('/(:alpha)', 'Home::$1');
$routes->get('/Berita/(:alpha)', 'Home::$1');
$routes->get('/Tes', 'Tes::index');

// Load FullCalendar Data
$routes->get('/events', 'Home::getEvents');

// Admin
$routes->match(['get', 'post'], '/Settings', 'Admin::index');
$routes->get('list-jemaat', 'Admin::listJemaat');
$routes->get('tambah-jemaat', 'Admin::tambahJemaat');
$routes->get('jadwal-ibadah', 'Admin::jadwalIBadah');
$routes->get('list-berita', 'Admin::listBerita');
$routes->get('tambah-berita', 'Admin::tambahBerita');
$routes->get('preview-berita', 'Admin::previewBerita');
$routes->get('login', 'Admin::login');  // Login page (login.php)
$routes->get('register', 'Admin::register');  // Register page (register.php)
$routes->get('forgot-password', 'Admin::forgot'); // Forget page (forget-password.php)
$routes->get('blank', 'Admin::blank');  // 404 error page (404.php)

$routes->setAutoRoute(true);
