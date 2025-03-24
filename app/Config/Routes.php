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
$routes->get('fetch-achievement','Home::fetchAchievement');
$routes->post('save-achievement','Home::saveAchievement');
//team
$routes->post('save-team','Home::saveTeam');
$routes->get('filter-team','Home::filterTeam');
//player
$routes->post('save-player','Home::savePlayer');
$routes->get('get-position','Home::getPosition');
$routes->get('filter-players','Home::filterPlayers');
$routes->post('edit-player','Home::editPlayer');
//map
$routes->get('shop-location','Home::shopLocation');
$routes->post('save-shop','Home::saveShop');
$routes->get('fetch-shop','Home::fetchShop');
$routes->post('edit-shop','Home::editShop');

$routes->group('',['filter'=>'AlreadyLoggedIn'],function($routes)
{
    $routes->get('auth','Home::auth');
    $routes->get('forgot-password','Home::forgotPassword');
});

$routes->group('',['filter'=>'AuthCheck'],function($routes)
{
    $routes->get('dashboard','Home::dashboard');
    //players
    $routes->get('athletes','Home::fetchAthletes');
    $routes->get('new-athlete','Home::newAthlete');
    $routes->get('athletes/profile/(:any)','Home::playerProfile/$1');
    $routes->get('athletes/edit-profile/(:any)','Home::editProfile/$1');
    //teams
    $routes->get('teams','Home::fetchTeams');
    $routes->get('teams/details/(:any)','Home::teamDetails/$1');
    $routes->get('teams/score/(:any)','Home::teamResults/$1');
    $routes->get('new-team','Home::newTeam');
    //accounts
    $routes->get('accounts','Home::accounts');
    $routes->get('new-account','home::newAccount');
    $routes->get('edit-account/(:any)','home::editAccount/$1');
    //events
    $routes->get('events','Home::Events');
    $routes->get('new-event','Home::newEvent');
    //shops
    $routes->get('shops','Home::shops');
    //videos
    $routes->get('videos','Home::manageVideos');
    $routes->get('upload','Home::upload');
    $routes->get('go-live','Home::goLive');
    //news
    $routes->get('news','Home::news');
    //settings
    $routes->get('settings','Home::settings');
    $routes->get('recovery','Home::recovery');
    //accounts
    $routes->get('my-account','Home::myAccount');
});