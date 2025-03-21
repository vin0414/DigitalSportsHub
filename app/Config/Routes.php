<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about','Home::about');
$routes->post('check','Home::checkAccount');
$routes->get('logout','Home::logout');
// ajax request
///user management
$routes->get('fetch-accounts','Home::fetchAccounts');
$routes->post('save-account','Home::saveAccount');
$routes->post('update','Home::updateAccount');
$routes->post('reset','Home::resetAccount');
///settings
$routes->get('fetch-sports','Home::fetchSports');
$routes->post('save-sports','Home::saveSports');
$routes->post('save-role','Home::saveRole');
$routes->get('fetch-role','Home::fetchRole');
//team
$routes->post('save-team','Home::saveTeam');

$routes->group('',['filter'=>'AlreadyLoggedIn'],function($routes)
{
    $routes->get('auth','Home::auth');
    $routes->get('forgot-password','Home::forgotPassword');
});

$routes->group('',['filter'=>'AuthCheck'],function($routes)
{
    $routes->get('dashboard','Home::dashboard');
    $routes->get('athletes','Home::fetchAthletes');
    //teams
    $routes->get('teams','Home::fetchTeams');
    $routes->get('teams/details/(:any)','Home::teamDetails/$1');
    $routes->get('teams/results/(:any)','Home::teamResults/$1');
    $routes->get('new-team','Home::newTeam');
    //accounts
    $routes->get('accounts','Home::accounts');
    $routes->get('new-account','home::newAccount');
    $routes->get('edit-account/(:any)','home::editAccount/$1');
    //events
    $routes->get('events','Home::Events');
    $routes->get('new-event','Home::newEvent');
    //settings
    $routes->get('settings','Home::settings');
});