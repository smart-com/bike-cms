<?php

	class Router {

		private $uri_parts;
		private $post;
		private $controller;

		public function __construct( $rout_uri = NULL, $post = NULL ) {

			if( !$rout_uri ) {
				$rout_uri = filter_input( INPUT_SERVER, 'REQUEST_URI' );
			}

			if( !$post ) {
				$post = filter_input_array( INPUT_POST );
			}

			$up				 = explode( '/', trim( $rout_uri, '/' ) );
			$this->uri_parts = $up;

			if( $post ) {
				$this->post = $post;
			}
		}

		public function Controller() {

			if( $this->uri_parts[ 0 ] == 'index.php' ) {
				$this->controller = DEFAULT_CTRL;
			}
			else {
				$this->controller = $this->uri_parts[ 0 ];
			}
			return 'controller_' . strtolower( $this->controller ) . '.php';
		}

		public function CtrlClass() {
			return 'Controller' . $this->controller;
		}

		public function Action() {
			return $this->uri_parts[ 1 ] ? : DEFAULT_ACTION;
		}

		public function Params() {

			$prm = array();
			for( $i = 2; $i < count( $this->uri_parts ); $i += 2 ) {
				$prm[ $this->uri_parts[ $i ] ] = $this->uri_parts[ $i + 1 ];
			}
			if( $this->post ) {
				$prm = $prm + $this->post;
			}
			return $prm;
		}

		public static function Start() {

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
		}

	}
