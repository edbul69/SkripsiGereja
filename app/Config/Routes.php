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



// Admin
// $routes->get('list-jemaat', 'Admin::listJemaat');
// $routes->get('tambah-jemaat', 'Admin::tambahJemaat');
// $routes->get('jadwal-ibadah', 'Admin::jadwalIBadah');
// $routes->get('list-berita', 'Admin::listBerita');
// $routes->get('tambah-berita', 'Admin::tambahBerita');
// $routes->get('preview-berita', 'Admin::previewBerita');
// $routes->get('login', 'Admin::login');  // Login page (login.php)
// $routes->get('register', 'Admin::register');  // Register page (register.php)
// $routes->get('forgot-password', 'Admin::forgot'); // Forget page (forget-password.php)
// $routes->get('blank', 'Admin::blank');  // 404 error page (404.php)

// Load FullCalendar Data
$routes->get('/events', 'Home::getEvents');

$routes->post('Admin/simpanJemaat', 'Admin::simpanJemaat');


$routes->setAutoRoute(true);
