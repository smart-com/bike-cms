<?php

	class Router {

		private $uri_parts;
		private $post;

		public function __construct( $rout_uri, $post = NULL ) {
			$up				 = explode( '/', trim( $rout_uri, '/' ) );
			$this->uri_parts = $up;
			if( $post ) {
				$this->post = $post;
			}
		}

		public function Controller() {
			return $this->uri_parts[ 0 ];
		}

		public function Action() {
			return $this->uri_parts[ 1 ];
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

	}
