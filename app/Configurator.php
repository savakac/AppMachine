<?php

namespace AppMachine;

include(__DIR__ . '/Object.php');

class Configurator extends \AppMachine\Object {
	private $baseDir;
	private $urlDir;
	private $controllers = array();
	private $includeDirs = array('libs', 'controllers');

	public function __costruct(array $settings) {
		session_start();
		$this->baseDir = $settings['baseDir'];
		$this->urlDir = $settings['urlDir'];
		$this->registerAutoloader();
		
		// Zapnutie error reportingu	
		error_reporting(E_ALL | E_STRICT);		
	}

	private function registerAutoloader() {
		sql_autoload_register(array($this, 'loadClass'));
	}

	private function loadClass($name) {
		$name = str_replace('\\', '/', $name);

		foreach($this->includeDirs as $dir) {
			$file = $this->baseDir . '/app/' . $dir . '/' . $name . '.php';
			if (is_file($file)) {
				include($file);
				return;
			}
		}
		
		throw new \AppMachine\Exceptions\ClassNotFoundException('Class ' . $name . ' does not exist.');
	}

	public function runApplication() {
		$request = new Http\HttpRequest($this);
		$app = new Application($request, $this);
		
		echo "runApplication";
		$app->generatePage();
	}

	public function getBaseDir() {
		return $this->baseDir;
	}

	public function getUrlDir() {
		return '/' . $this->urlDir;
	}

	public function registerController($name, \AppMachine\Controller $controller) {
		if(!array_key_exists($name, $this->controllers)) {
			$this->controllers[$name] = $controller;
			$this->controllers[$name]->setConfigurator($this);
		} else {
			throw new \AppMachine\Exceptions\ControlerAlreadyExists;
		}
	}

	public function getController($name) {
		if (array_key_exists($name, $this->controllers)) {
			return $this->controllers[$name];
		} else {
			throw new \Exception('Controller isnt registered.');
		}
	}
}
