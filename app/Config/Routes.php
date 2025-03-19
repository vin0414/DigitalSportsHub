<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('about','Home::about');
$routes->post('check','Home::checkAccount');
$routes->get('logout','Home::logout');
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
});