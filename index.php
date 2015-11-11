<?php

	try {

		if( filter_input( INPUT_SERVER, 'QUERY_STRING' ) ) {

			$prm = explode( '?', filter_input( INPUT_SERVER, 'REQUEST_URI' ) );
			$prm = trim( $prm[ 0 ], '/' );

			if( strlen( $prm ) ) {
				$prm = $prm . '/';
			}

			foreach( filter_input_array( INPUT_GET ) as $key => $value ) {
				$prm = $prm . $key . '/' . $value . '/';
			}
			header( "Location: /" . $prm, TRUE, 301 );
		}


		session_start();
		define( '__ROOT__', dirname( __FILE__ ) . '/' );

		require_once 'config.php';
		require_once 'router.php';

		$req_uri = filter_input( INPUT_SERVER, 'REQUEST_URI' );
		$post	 = filter_input_array( INPUT_POST );
		$router	 = new Router( $req_uri, $post );

		$ctrl		 = $router->Controller() ? : DEFAULT_CTRL;
		$ctrl_php	 = 'controller_' . strtolower( $ctrl ) . '.php';

		if( strtolower( $ctrl ) == 'index.php' ) {
			$ctrl = DEFAULT_CTRL;
		}

		$ctrl_php	 = 'controller_' . strtolower( $ctrl ) . '.php';
		$ctrl_class	 = 'Controller' . $ctrl;
		$action		 = $router->Action() ? : DEFAULT_ACTION;

		$params = $router->Params();

		require_once DIR_CTRL . $ctrl_php;

		$controller = new $ctrl_class();
		$controller->$action( $params );
	}
	catch( Exception $ex ) {
		echo 'Error!!!' . $ex;
	}
