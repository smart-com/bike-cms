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
								  $params[ 'catId' ], $params[ 'pubDate' ] ),
				'authors'	 => array( -1 => '- Все -' ) + Author::GetAll( $this->conn ),
				'authId'	 => $params[ 'authId' ],
				'cats'		 => array( -1 => '- Все -' ) + Category::GetAll( $this->conn ),
				'catId'		 => $params[ 'catId' ],
				'pubDates'	 => array( -1 => '- Все -', -2 => 'За эту неделю', -3 => 'За этот год' ),
				'pubDate '	 => $params[ 'pubDate' ]
					)
			);
		}

		/**
		 * Если форма пустая
		 * Остаемся на странице добавления статьи
		 * Если заполнены поля названия и содержимого статьи
		 * Показываем шаблон успешного добавления статьи
		 *
		 * @param array $params Переменные из $_POST
		 */
		public function Add( $params ) {

			if(!$params['content'] || !$params['name']) {

				$this->view->Show( 'edit_article.tpl',
					array(
						'articles'	 => Article::Find( $this->conn, $params[ 'authId' ],
													  $params[ 'catId' ] ),
						'authors'	 => array( -1 => '- Все -' ) + Author::GetAll( $this->conn ),
						'authId'	 => $params[ 'authId' ],
						'cats'		 => array( -1 => '- Все -' ) + Category::GetAll( $this->conn ),
						'catId'		 => $params[ 'catId' ],
						'pubDates'	 => array( -1 => '- Все -', -2 => 'За эту неделю', -3 => 'За этот год' ),
						'pubDate '	 => $params[ 'pubDate' ]
						)
					);
			}
			else {
				Article::EditArticle($this->conn, $params );
				$this->view->Show( 'success.tpl' );
			}
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
