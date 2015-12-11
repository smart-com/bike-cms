<?php

	require_once 'model.php';
	require_once 'model_author.php';
	require_once 'model_category.php';

	/**
	 * Класс для обработки статей
	 */
	class Article extends Model {

		/**
		 * @var object Объект статьи
		 */
		private $data;

		public static function Init( $id, $name, $content, $pubdate, $cat,
							   $auth = NULL ) {

			/**
			 * @var object Новый объект статьи
			 */
			$ret = new Article();

			/**
			 * @var int id Идентификатор статьи из БД
			 */
			$ret->id = $id;

			/**
			 * @var string name Полное имя статьи из БД
			 */
			$ret->name = $name;

			/**
			 * @var datetime pubdate Дата публикации статьи из БД
			 */
			$ret->pubdate = $pubdate;

			/**
			 * @var string content Содержимое статьи из БД
			 */
			$ret->content = $content;

			/**
			 * @var string category Название категории статьи из  БД
			 */
			$ret->category = $cat;

			/*
			 * @var array authors Массив с именами авторов | Пустой массив
			 */
			$ret->authors = (isset( $auth ) ? array( $auth ) : array());

			/**
			 * @return object Объект статьи
			 */
			return $ret;
		}

		/**
		 * Возвращает свойство класса, преобразованное в строку
		 *
		 * @return string
		 */
		public function __toString() {
			return $this->name;
		}

		/**
		 * Возвращает значение свойства
		 *
		 * @param string | object $name Имя свойства
		 * @return string
		 */
		public function __get( $name ) {
			return $this->data[ $name ];
		}

		/**
		 * Преобразовывает параметр к соответствующему типу данных
		 * и устанавливает приведенное значение в свойство объекта статьи
		 *
		 * @param string $name Имя свойства
		 * @param string $value Значение свойства
		 */
		public function __set( $name, $value ) {

			if( substr( $name, -2 ) == 'id' ) {
				$this->data[ $name ] = ( int ) $value;
			}
			else if( $this->data[ $pubdate ] == 'pubdate' ) {
				$this->data[ $pubdate ] = date_create( $value );
			}
			else {
				$this->data[ $name ] = $value;
			}
		}

		public static function UpdateLinks( $conn, $params, $authId = NULL,
									  $catId = NULL, $pubDate = NULL, $art_id = NULL ) {

			/** Достаем идентификатор статьи из базы данных */
			$allowed = array( "name" );

			$sql = "SELECT ID FROM Articles WHERE " . Model::pdoSet( $allowed, $values );
			$stm = $conn->prepare( $sql );
			$stm->execute( $values );

			$art_id	 = $stm->fetchColumn();

			/** Обновляем связь с категориями */
			$allowed = array( "ID_Article", "ID_Category" ); // allowed fields
			$source	 = array( "ID_Article" => ( int ) $art_id, "ID_Category" => ( int ) $params[ 'catId' ] );

			$sql = "INSERT INTO `ArtCat` SET " . Model::pdoSet( $allowed, $values, $source );
			$stm = $conn->prepare( $sql );
			$stm->execute( $source );

			/** Обновляем связь с автором */
			$allowed = array( "ID_Article", "ID_Author" ); // allowed fields
			$source	 = array( "ID_Article" => ( int ) $art_id, "ID_Author" => ( int ) $params[ 'authId' ] );

			$sql = "INSERT INTO `ArtAuth` SET " . Model::pdoSet( $allowed, $values, $source );
			$stm = $conn->prepare( $sql );

			$stm->execute( $source );
		}

		/**
		 * Добавляет статью в базу данных
		 *
		 * @param reference $conn Соединение с БД
		 * @param int $authId Идентификатор автора статьи
		 * @param int $catId Идентификатор категории
		 * @param datetime $pubDate Дата публикации статьи
		 */
		public function EditArticle( $conn, $params, $authId = NULL, $catId = NULL,
							   $pubDate = NULL ) {

			$allowed = array( "name", "content", "pubdate" );
			$sql	 = "INSERT INTO Articles SET " . Model::pdoSet( $allowed, $values );
			$stm	 = $conn->prepare( $sql );
			$stm->execute( $values );
			Article::UpdateLinks( $conn, $params );
		}

		/**
		 * Фильтрует статьи из базы данных по автору, по категории
		 * и по дате публикации
		 *
		 * @param reference $conn Соединение с БД
		 * @param int $authId Идентификатор автора статьи
		 * @param int $catId Идентификатор категории
		 * @param datetime $pubDate Дата публикации статьи
		 * @return object[]
		 */
		public static function Find( $conn, $authId = NULL, $catId = NULL,
							   $pubDate = NULL ) {

			// Формируем условия для фильтрации статей
			$q = "Select Articles.ID, Articles.Name, Articles.Content, Articles.PubDate,
					Category.ID, Category.Name,
					Authors.ID, Authors.Name
				From Category,
					Articles Left Outer Join ArtAuth On ArtAuth.ID_Article = Articles.ID
					Left Outer Join ArtCat On ArtCat.ID_Article = Articles.ID
					Left Outer Join Authors On Authors.ID = ArtAuth.ID_Author
				Where ArtAuth.ID_Author = Authors.ID and ArtCat.ID_Category = Category.ID";

			if( isset( $authId ) && $authId >= 0 ) {
				$q = $q . " And Authors.ID = $authId";
			}
			if( isset( $catId ) && $catId >= 0 ) {
				$q = $q . " And Category.ID = $catId";
			}
			if( isset( $pubDate ) ) {

				if( $pubDate == -2 ) {
					$q = $q . " And TO_DAYS(NOW()) - TO_DAYS(Articles.PubDate) <= 7";
				}
				elseif( $pubDate == -3 ) {
					$q = $q . " And TO_DAYS(NOW()) - TO_DAYS(Articles.PubDate) <= 365";
				}
			}

			/** @var reference Запрос в базу данных */
			$res = $conn->query( $q );

			/** @var array[] Массив объектов класса Article */
			$articles = array();

			while( $article = $res->fetch() ) {

				$id		 = $article[ 0 ];
				$auth	 = NULL;

				if( isset( $article[ 6 ] ) ) {
					$auth = new Author( $article[ 6 ], $article[ 7 ] );
				}
				$id = $article[ 0 ];

				if( isset( $articles[ $id ] ) && isset( $auth ) ) {
					$arr						 = $articles[ $id ]->authors;
					$arr[]						 = $auth;
					$articles[ $id ]->authors	 = $arr;
				}
				else {
					$articles[ $id ] = Article::Init( $id, $article[ 1 ], $article[ 2 ],
									   $article[ 3 ], new Category( $article[ 4 ], $article[ 5 ] ),
										 new Author( $article[ 6 ], $article[ 7 ] ), $auth
					);
				}
			}
			return $articles;
		}

	}
