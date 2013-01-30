<?php

// Variables for MoonDragon Templates

$vars['test'] = 'test';

// Loading the template

$filename = basename(__FILE__, '.php');
echo Template::load('../'.$filename, $vars, true);

