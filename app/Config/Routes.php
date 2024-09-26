<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/Berita', 'Home::news');
$routes->get('/Settings', 'Admin::index');
$routes->get('/Tes', 'Tes::index');

// Pelayanan
$routes->get('/Baptisan', 'Home::baptisan');
$routes->get('/Penyerahan', 'Home::penyerahan');
$routes->get('/Perjamuan', 'Home::perjamuan');
$routes->get('/Sunday', 'Home::sunday');
$routes->get('/Doa', 'Home::doa');
$routes->get('/Ibadah', 'Home::ibadah');
$routes->get('/MOC', 'Home::moc');
$routes->get('/ABA', 'Home::aba');
$routes->get('/Sekolah', 'Home::sekolah');

// Admin
$routes->get('login', 'Admin::login');  // Login page (login.php)
$routes->get('register', 'Admin::register');  // Register page (register.php)
$routes->get('forgot-password', 'Admin::forgot'); // Forget page (forget-password.php)
$routes->get('tables', 'Admin::tables');  // Tables page (tables.php)
$routes->get('charts', 'Admin::charts');  // Charts page (charts.php)
$routes->get('buttons', 'Admin::buttons');  // Buttons page (buttons.php)
$routes->get('cards', 'Admin::cards');  // Buttons page (buttons.php)
$routes->get('utilities-(:any)', 'Admin::utilities/$1');  // Dynamic route for utility pages (e.g., utilities-color.php)
$routes->get('404', 'Admin::error404');  // 404 error page (404.php)
$routes->get('blank', 'Admin::blank');  // 404 error page (404.php)



$routes->setAutoRoute(true);
