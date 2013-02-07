<?php
defined('_LOADED') or die();
// Variables for MoonDragon Templates

$vars['test'] = 'test';

// Loading the template

$filename = basename(__FILE__, '.php');
echo Template::load($filename.'.html', $vars, true);

