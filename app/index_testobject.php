<?php

class TestObject {

	private $stringValue;

	public function __construct($stringValue) {
		$this->stringValue = $stringValue;
	}

	public function hello() {
		echo( "Zdravim ta velky priatel " . $this->stringValue);
	}

}

$object = new TestObject("Jan");
$object->hello();