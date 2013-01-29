<?php

include "conf.php";

// TODO  replace this process with the MoonDragon Route system
define('URI_LEVEL', 0);


$uri = isset($_SERVER['REQUEST_URI'])?$_SERVER['REQUEST_URI']:'';
list($request) = explode('?', $uri);
$request = trim($request, '/');
$niveles = explode('/', $request);
if(isset($section['/'.$niveles[URI_LEVEL]])) {
	$sec = $section['/'.$niveles[URI_LEVEL]];

	if (file_exists($sec)) {
		$contents = Template::load($sec, array(), true);
	}
	elseif (file_exists('page.'.$sec)) {
		$contents = Template::load('page.'.$sec);
	}
}
else {
	if(file_exists('page.'.$request)) {
		$contents = Template::load('page.'.$request);
	}
	elseif(file_exists('page.'.$request.'.html')) {
		$contents = Template::load('page.'.$request.'.html');
	}
	elseif(file_exists($request)) {
		$contents = Template::load($request, array(), true);
	}
	elseif(file_exists($request.'.html')) {
		$contents = Template::load($request.'.html', array(), true);
	}
	else {
		header("HTTP/1.0 404 Not Found");
		header('Status: 404 Not Found');
		if(file_exists('404.html')) {
			include '404.html';
		}
		else {
			header('Content-type: text/html; charset=UTF-8');
			echo 'Página no encontrada: '.$request;
		}
	}
}

if(isset($contents)) {
	    echo $contents;
}

