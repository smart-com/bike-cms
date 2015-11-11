<?php

	require_once 'model.php';

	class Author extends Model {

		public $id, $name;

		public function __construct( $id = NULL, $name = NULL ) {
			$this->id	 = $id;
			$this->name	 = $name;
		}

		public function __toString() {
			return $this->name;
		}

		public static function GetAll( $conn ) {
			return Model::Select( $conn, 'Authors', array( 'ID', 'Name' ), 'Author' );
		}

	}
