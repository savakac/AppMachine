<?php

define("WWW_DIR", __DIR__);
define("APP_DIR", WWW_DIR . '/app');

include(APP_DIR . '/libs...');
include(APP_DIR . '/libs...');

$settings = array(
	'baseDir' => WWW_DIR,
	'urlDir' => 'AppMachine',
);

$configurator = new \AppMachine\Configurator($settings);

$configurator->runApplication();
