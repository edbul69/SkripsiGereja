<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], '/Settings', 'Admin::index');
$routes->get('/Tes', 'Tes::index');

// Berita
$routes->get('/Berita', 'Home::news');
$routes->get('/Sample', 'Home::sample');

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
$routes->get('list-jemaat', 'Admin::listJemaat');
$routes->get('tambah-jemaat', 'Admin::tambahJemaat');
$routes->get('jadwal-ibadah', 'Admin::jadwalIBadah');
$routes->get('list-berita', 'Admin::listBerita');
$routes->get('tambah-berita', 'Admin::tambahBerita');
$routes->get('login', 'Admin::login');  // Login page (login.php)
$routes->get('register', 'Admin::register');  // Register page (register.php)
$routes->get('forgot-password', 'Admin::forgot'); // Forget page (forget-password.php)
$routes->get('blank', 'Admin::blank');  // 404 error page (404.php)

$routes->setAutoRoute(true);
