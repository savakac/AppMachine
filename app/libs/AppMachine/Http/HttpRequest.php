<?php

namespace AppMachine\Http;

use AppMachine\Object;

class HttpRequest extends Object {

	private $config;
	private $host;
	private $path;
	private $query;
	private $pathInfo;

	public function __construct(\AppMachine\Configurator $config) {
		$this->config = $config;

		$fullURL = 'http://';
		$fullURL .= $_SERVER['SERVER_NAME'];
		$fullURL .= $_SERVER['REQUEST_URI'];

		$urlParts = parse_url($fullURL);
		$this->host = $urlParts['host'];
		$this->path = $urlParts['path'];
		parse_str($_SERVER['QUERY_STRING'], $this->query);

		$urlParts = explode($this->config->getUrlDir(), $this->getPath());
		$urlParts = preg_replace('/^\//', '', $urlParts[0]);
		$this->pathInfo = explode('/', $urlParts);
	}

	public function getHost() {
		return $this->host;
	}

	public function getPath() {
		return $this->path;
	}

	public function getPathInfo() {
		return $this->pathInfo;
	}

	public function getQuery() {
		return $this->query;
	}
}