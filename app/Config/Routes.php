<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('download-questionnaire', 'Home::templateQuestionnaire', ['as'   => 'download.questionnaire']);
$routes->group('questionnaire',  ['filter' => 'login'],  static function ($routes) {
    $routes->get('index', 'Home::home', ['as'   => 'home']); 
    $routes->post('store', 'Home::store', ['as'  => 'store.questionnaire']); 
    $routes->post('update', 'Home::update', ['as'  => 'update.questionnaire']);
    $routes->post('delete', 'Home::delete', ['as'  => 'delete.questionnaire']);
    $routes->post('show', 'Home::show', ['as'     => 'show.questionnaire']);
    $routes->post('edit', 'Home::edit', ['as'     => 'edit.questionnaire']);
});

$routes->post('checkAccount', 'Home::checkAccount', ['as'  => 'checkAccount']); 
$routes->post('get-regions', 'Home::getReg', ['as'  => 'getReg']); 
$routes->post('get-departements', 'Home::getDept', ['as'  => 'getDept']);
$routes->post('get-sous-prefectures', 'Home::getSSP', ['as'  => 'getSSP']);
$routes->post('get-localites', 'Home::getLoc', ['as'  => 'getLoc']);
$routes->post('get-quartiers', 'Home::getQuart', ['as'  => 'getQuart']);
$routes->post('get-zd', 'Home::getZD', ['as'  => 'getZD']); 