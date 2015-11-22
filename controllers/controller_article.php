<?php

	require_once 'controller.php';
	require_once DIR_MODEL . 'model_article.php';
	require_once DIR_MODEL . 'model_author.php';
	require_once DIR_MODEL . 'model_category.php';

	class ControllerArticle extends Controller {

		public function Index( $params ) {

			$this->view->Show( 'articles.tpl',
					  array(
				'articles'	 => Article::Find( $this->conn, $params[ 'authId' ],
								  $params[ 'catId' ] ),
				'authors'	 => array( -1 => '- Все -' ) + Author::GetAll( $this->conn ),
				'authId'	 => $params[ 'authId' ],
				'cats'		 => array( -1 => '- Все -' ) + Category::GetAll( $this->conn ),
				'catId'		 => $params[ 'catId' ]
					)
			);
		}

		public function Delete( $params ) {
			Article::Delete( $this->conn, $params[ 'id' ] );
		}

		//public function Update( $params ) {
		//}
		//public function Insert( $params ) {
		//}
		//public function Edit( $params ) {
		//}
		//public function Show( $params ) {
		//}
		//public function Add( $params ) {
		//}
	}
