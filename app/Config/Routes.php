<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about','Home::about');
$routes->post('check','Home::checkAccount');
$routes->get('logout','Home::logout');
//ajax
$routes->get('fetch-accounts','Home::fetchAccounts');
$routes->post('save-account','Home::saveAccount');
$routes->post('update','Home::updateAccount');
$routes->post('reset','Home::resetAccount');

$routes->group('',['filter'=>'AlreadyLoggedIn'],function($routes)
{
    $routes->get('auth','Home::auth');
    $routes->get('forgot-password','Home::forgotPassword');
});

$routes->group('',['filter'=>'AuthCheck'],function($routes)
{
    $routes->get('dashboard','Home::dashboard');
    $routes->get('players','Home::fetchPlayers');
    $routes->get('teams','Home::fetchTeams');
    $routes->get('accounts','Home::accounts');
    $routes->get('new-account','home::newAccount');
    $routes->get('edit-account/(:any)','home::editAccount/$1');
});