<?php

	require_once 'controller.php';
	require_once DIR_MODEL . 'model_category.php';

	class ControllerCategory extends Controller {

		public function Index( $params ) {
			print_r( Category::GetAll( $this->conn ) );
		}

	}
