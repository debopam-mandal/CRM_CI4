
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
$routes->get('/setup', 'Setup::index');
$routes->get('/setup/drop', 'Setup::dropTable');
$routes->get('/setup/user_seed', 'Setup::userSeed');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('customers', 'Customer::index');
$routes->get('customers/create', 'Customer::create');
$routes->post('customers/store', 'Customer::store');
$routes->get('customers/edit/(:num)', 'Customer::edit/$1');
$routes->post('customers/update/(:num)', 'Customer::update/$1');
$routes->get('users', 'User::index');
$routes->get('users/create', 'User::create');
$routes->post('users/store', 'User::store');
$routes->get('users/edit/(:num)', 'User::edit/$1');
$routes->post('users/update/(:num)', 'User::update/$1');
$routes->setAutoRoute(false);

$routes->group('api', function ($routes) {
    $routes->get('customers', 'Api\CustomerApi::index');
    $routes->get('customers/(:num)', 'Api\CustomerApi::show/$1');
    $routes->post('customers', 'Api\CustomerApi::create');
    $routes->put('customers/(:num)', 'Api\CustomerApi::update/$1');
    $routes->delete('customers/(:num)', 'Api\CustomerApi::delete/$1');

    $routes->get('users', 'Api\UserApi::index');
    $routes->get('users/(:num)', 'Api\UserApi::show/$1');
    $routes->post('users', 'Api\UserApi::create');
    $routes->put('users/(:num)', 'Api\UserApi::update/$1');
    $routes->delete('users/(:num)', 'Api\UserApi::delete/$1');
});
