<?php

	require_once 'config.php';

		function getConn( $db_host = DB_HOST, $db_name = DB_NAME, $charset = CHARSET,
					$db_user = DB_USER, $db_password = DB_PASSWORD ) {
			$opt = array(
				PDO::ATTR_ERRMODE			 => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			);

			$conn = new PDO( "mysql:host=$db_host;dbname=$db_name; charset=$charset",
					$db_user, $db_password );
			return $conn;
		}
