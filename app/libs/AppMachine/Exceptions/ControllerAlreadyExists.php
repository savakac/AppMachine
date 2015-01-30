<?php

namespace AppMachine\Exceptions;

class ControllerAlreadyExists extends \Exception {

	public function __construct() {
		parent::__construct('Controller id already registered.');
	}
}