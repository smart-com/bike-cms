<?php

	define( '__ROOT__', dirname( __FILE__ ) . '/' );

	require_once 'config.php';
	require_once 'router.php';

	Router::Start();
	session_start();

	$router = new Router();

	$controller	 = $router->Controller();
	$ctrl_class	 = $router->CtrlClass();
	$action		 = $router->Action();
	$params		 = $router->Params();

	require_once DIR_CTRL . $controller;

	$controller = new $ctrl_class();
	$controller->$action( $params );
