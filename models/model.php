<?php

	class Model {

		protected static function Select( $conn, $tbl, $fields, $class ) {
			$prm = '';
			for( $i = 0; $i < count( $fields ); $i++ ) {
				$prm = $prm . (empty( $prm ) ? '' : ',') . '$r[' . $i . ']';
			}
			$eval = '$obj=new ' . "$class($prm);";

			$q	 = "Select " . implode( ',', $fields ) . " From $tbl";
			$res = $conn->query( $q );
			$ret = array();
			while( $r	 = $res->fetch() ) {
				$obj			 = NULL;
				eval( $eval );
				$ret[ $r[ 0 ] ]	 = $obj;
			}
			return $ret;
		}

		protected function pdoSet( $allowed, &$values, $source = array() ) {

			$set	 = '';

			if(empty($values)) {
				$values	 = array();
			}
			if( !$source ) {
				$source = &$_POST;
			}

			foreach( $allowed as $field ) {
				if( isset( $source[ $field ]) ) {

					if($field == 'pubdate' && $source[$field] === '') {
						$source[$field] = (string)date_create()->format('Y-m-d');
					}

					$set.="`" . str_replace( "`", "``", $field ) . "`" . "=:$field, ";
					$values[ $field ] = $source[ $field ];
				}
			}

			return substr( $set, 0, -2 );
		}
	}
