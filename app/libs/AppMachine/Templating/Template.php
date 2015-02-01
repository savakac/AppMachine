<?php

namespace AppMachine\Templating;

use AppMachine\Object,
	AppMacnine\Exceptions\NoTemplateFileException;

abstract class Template extends Object {

	protected $variable = array();
	protected $templateFile;
	protected $config;

	public function __construct($filename, AppMachine\Configurator $config) {
		if (is_file(APP_DIR . '/templates/' . $filename . '.template')) {
			$this->templateFile = $filename;
		} else {
			throw new NoTemplateFileException('Template file (' . $filename . '.template) is missing.');
		}
		$this->config = $config;
	}

	public function setTemplateFile($filename) {
		$this->templateFile = $filename;
	}

	public function addVariable($name, $value) {
		$this->variable[$name] = $value;
	}

	public function getVariable($name) {
		return $this->varibles[$name];
	}

	public function getAllVaribles() {
		return $this->varibles;
	}

	abstract public function getTemplateData();
}