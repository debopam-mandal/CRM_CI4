
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
$routes->get('/setup', 'Setup::index');
$routes->get('/setup/drop', 'Setup::dropTable');
$routes->get('/setup/user_seed', 'Setup::userSeed');

$routes->setAutoRoute(false);

$routes->group('api', function ($routes) {
    // Public API routes (no auth)
    $routes->post('auth/login', 'Webservices\AuthController::login');
    $routes->post('auth/register', 'Webservices\AuthController::register');

    // Protected API routes (auth middleware)
    $routes->get('customers', 'Webservices\CustomerApi::index', ['filter' => 'auth']);
    $routes->get('customers/(:num)', 'Webservices\CustomerApi::show/$1', ['filter' => 'auth']);
    $routes->post('customers', 'Webservices\CustomerApi::create', ['filter' => 'auth']);
    $routes->put('customers/(:num)', 'Webservices\CustomerApi::update/$1', ['filter' => 'auth']);
    $routes->delete('customers/(:num)', 'Webservices\CustomerApi::delete/$1', ['filter' => 'auth']);

    $routes->get('users', 'Webservices\UserApi::index', ['filter' => 'auth']);
    $routes->get('users/(:num)', 'Webservices\UserApi::show/$1', ['filter' => 'auth']);
    $routes->post('users', 'Webservices\UserApi::create', ['filter' => 'auth']);
    $routes->put('users/(:num)', 'Webservices\UserApi::update/$1', ['filter' => 'auth']);
    $routes->delete('users/(:num)', 'Webservices\UserApi::delete/$1', ['filter' => 'auth']);

    // CRM API routes (protected)
    $routes->get('dashboard', 'Webservices\DashboardController::index', ['filter' => 'auth']);
    $routes->resource('leads', ['controller' => 'Webservices\LeadController', 'filter' => 'auth']);
    $routes->post('leads/bulk-assign', 'Webservices\LeadController::bulkAssign', ['filter' => 'auth']);
    $routes->get('lead-stages', 'Webservices\LeadStageController::index', ['filter' => 'auth']);
    $routes->get('lead-types', 'Webservices\LeadTypeController::index', ['filter' => 'auth']);
    $routes->get('crm-settings', 'Webservices\CRMSettingsController::index', ['filter' => 'auth']);
    $routes->put('crm-settings', 'Webservices\CRMSettingsController::update', ['filter' => 'auth']);
});
