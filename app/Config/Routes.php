<?php

namespace Config;

$routes = Services::routes();

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

// Login routes
$routes->get('login', 'Login::index');
$routes->post('login', 'HomeController::login');

// Registration routes
$routes->get('registration', 'Registration::index');
$routes->post('registration/register', 'Registration::register');

// Home route
$routes->get('/', 'HomeController::index');
$routes->get('home', 'HomeController::index'); 

// Logout route (handle with POST)
$routes->match(['GET', 'POST'], 'logout', 'HomeController::logout');

// Upcoming Tournament route
$routes->get('upcomingtourna', 'HomeController::upcomingTournaments');

// Admin Tournament routes
$routes->get('admin_tournareg', 'AdminTournamentController::index');
$routes->post('admin_tournareg', 'AdminTournamentController::index'); 

// Game Management routes
$routes->get('add_game', 'AdminTournamentController::addGame');
$routes->post('add_game', 'AdminTournamentController::saveGame');

$routes->get('edit_game/(:segment)', 'AdminTournamentController::editGame/$1');
$routes->post('edit_game/(:segment)', 'AdminTournamentController::updateGame/$1');

$routes->post('update_game/(:segment)', 'AdminTournamentController::updateGame/$1'); 

$routes->get('delete_game/(:segment)', 'AdminTournamentController::deleteGame/$1');

