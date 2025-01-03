<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Beranda');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
$routes->get('/galeri', 'PostController::index');
$routes->get('detailkucinganggora/(:num)', 'Detailanggora::detail/$1');
$routes->post('/submit_post', 'PostController::submitPost');
$routes->get('/artikel', 'ArticleController::index');
$routes->get('/isiartikel/(:num)', 'ArticleController::view/$1');
$routes->get('/anggora', 'Anggora::index');

$routes->post('/submit', 'ForumController::submit');
$routes->get('/detailforum/(:num)', 'ForumController::detail/$1'); 
$routes->post('/detailforum/comment', 'ForumController::comment');

$routes->get('detailkucingdomestik/(:num)', 'Detaildomestik::detail/$1');
$routes->get('/domestik', 'Domestik::index');

$routes->get('detailkucingpersia/(:num)', 'Detailpersia::detail/$1');
$routes->get('/persia', 'Persia::index');

$routes->get('detailkucingsphynx/(:num)', 'Detailsphynx::detail/$1');
$routes->get('/sphynx', 'Sphynx::index');

$routes->get('detailkucingmainecoon/(:num)', 'Detailmainecoon::detail/$1');
$routes->get('/mainecoon', 'Mainecoon::index');

$routes->get('/forum', 'ForumController::index');
$routes->post('/submit', 'ForumController::submitPost');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('auth/loginAuth', 'Auth::loginAuth');
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'authcheck'], function($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('auth/logout', 'Auth::logout');
    // Add other admin routes that need to be protected here
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'authcheck'], function($routes) {
    $routes->get('artikel', 'Artikel::index');
    $routes->get('artikel/create', 'Artikel::create');
    $routes->post('artikel/store', 'Artikel::store');
    $routes->get('artikel/edit/(:segment)', 'Artikel::edit/$1');
    $routes->put('artikel/update/(:segment)', 'Artikel::update/$1');
    $routes->delete('artikel/delete/(:segment)', 'Artikel::delete/$1');
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'authcheck'], function($routes) {
    $routes->get('anggora', 'AnggoraController::index');
    $routes->get('anggora/create', 'AnggoraController::create');
    $routes->post('anggora/store', 'AnggoraController::store');
    $routes->get('anggora/edit/(:segment)', 'AnggoraController::edit/$1');
    $routes->put('anggora/update/(:segment)', 'AnggoraController::update/$1');
    $routes->delete('anggora/delete/(:segment)', 'AnggoraController::delete/$1');
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'authcheck'], function($routes) {
    $routes->get('domestik', 'DomestikController::index');
    $routes->get('domestik/create', 'DomestikController::create');
    $routes->post('domestik/store', 'DomestikController::store');
    $routes->get('domestik/edit/(:segment)', 'DomestikController::edit/$1');
    $routes->put('domestik/update/(:segment)', 'DomestikController::update/$1');
    $routes->delete('domestik/delete/(:segment)', 'DomestikController::delete/$1');
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'authcheck'], function($routes) {
    $routes->get('persia', 'PersiaController::index');
    $routes->get('persia/create', 'PersiaController::create');
    $routes->post('persia/store', 'PersiaController::store');
    $routes->get('persia/edit/(:segment)', 'PersiaController::edit/$1');
    $routes->put('persia/update/(:segment)', 'PersiaController::update/$1');
    $routes->delete('persia/delete/(:segment)', 'PersiaController::delete/$1');
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'authcheck'], function($routes) {
    $routes->get('sphynx', 'SphynxController::index');
    $routes->get('sphynx/create', 'SphynxController::create'); // changed route path
    $routes->post('sphynx/store', 'SphynxController::store'); // changed route path
    $routes->get('sphynx/edit/(:segment)', 'SphynxController::edit/$1');
    $routes->put('sphynx/update/(:segment)', 'SphynxController::update/$1');
    $routes->delete('sphynx/delete/(:segment)', 'SphynxController::delete/$1');
});

$routes->group('admin', ['namespace' => 'App\Controllers\Admin', 'filter' => 'authcheck'], function($routes) {
    $routes->get('mainecoon', 'MainecoonController::index');
    $routes->get('mainecoon/create', 'MainecoonController::create'); // changed route path
    $routes->post('mainecoon/store', 'MainecoonController::store'); // changed route path
    $routes->get('mainecoon/edit/(:segment)', 'MainecoonController::edit/$1');
    $routes->put('mainecoon/update/(:segment)', 'MainecoonController::update/$1');
    $routes->delete('mainecoon/delete/(:segment)', 'MainecoonController::delete/$1');
});

$routes->get('/', 'Beranda::index');
