<?php

interface IDriving {

	public function speed();

}

abstract class Auto implements IDriving {

	protected $age;
	protected $speed;

	public function __construct() {
		$this->age = null;
		$this->speed = null;
	}

	abstract public function soundEngine();

	public function getAge() {
		return $this->age;
	}

	public function getSpeed() {
		return $this->speed;
	}

	public function setAge($age) {
		$this->age = $age;
	}

	public function setSpeed($speed) {
		$this->speed = $speed;
	}

}

class RedAuto extends Auto {

	public function __construct() {
		Auto::__construct();
	}

	public function soundEngine() {
		echo("Cervene auto robi krasny zvuk.");
	}

	public function speed() {
		echo("Cervene auto ide rychlostou 190.");
	}

}

$MojeRedAuto = new RedAuto();
$MojeRedAuto->setAge("20");
$MojeRedAuto->speed();
echo($MojeRedAuto->getAge());
