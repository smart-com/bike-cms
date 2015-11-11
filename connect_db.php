<?php

	require_once 'config.php';

	function getConn() {
		$conn = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );


		if( mysqli_connect_errno() ) {
			printf( "Не удалось подключиться: %s\n", mysqli_connect_error() );
			exit();
		}

		$conn->options( MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1 );
		$conn->query( "SET NAMES utf8" );

		return $conn;
	}
