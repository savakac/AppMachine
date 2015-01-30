<?php 

namespace test;

use \test\user\testclass\connect as NT;

class Database {

	public function __construct() {
		echo __CLASS__ . '<br />';
		new NT\From();
	}
}

define('DOG', 'haf haf');