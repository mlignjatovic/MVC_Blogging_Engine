<?php

class Database {

	
	protected $db;

	function __construct ($f3) {


	if (is_object($db)) {
			$this->db = $db;
	}
	else {

		$this->db = new DB\SQL(
			    $f3->get('dsn'),
			    $f3->get('db_user'),
			    $f3->get('db_pass')
			);
	 	}
	}

}