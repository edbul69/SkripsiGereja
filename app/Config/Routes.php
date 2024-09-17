<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/Berita', 'Home::news');
$routes->get('/Sample', 'Home::sample');
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





$routes->setAutoRoute(true);
