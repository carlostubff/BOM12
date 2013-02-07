<?php

// MoonDragon framework path
$moondragon_path = './moondragon';

// Base URL
$url = 'http://localhost/bom12';

// Section routes
require_once $moondragon_path.'/moondragon.manager.php';

Router::addSection('index', 'modules/index.php', '', true);
Router::addSection('test', 'modules/test.php');

// Templates
require_once $moondragon_path.'/moondragon.render.php';

Vars::set('base_url', $url.'/');

Template::addDir('.');
Template::addDir('includes');

// Database Information
// Uncomment lines to activate

// require_once $moondragon_path.'/moondragon.database.php';
// $db['engine'] = 'mysql';
// $db['host'] = 'localhost';
// $db['user'] = 'root';
// $db['password'] = '';
// $db['database'] = 'test';
// Database::connect($db['engine'], $db['host'], $db['user'], $db['password'], $db['database']);
