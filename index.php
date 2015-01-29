<?php

use \AppMachine\app;

define("WWW_DIR", __DIR__);
define("APP_DIR", WWW_DIR . '/app');

include(APP_DIR . '/Configurator.php');
include(APP_DIR . '/Debager/Debager.php');

$settings = array(
	'baseDir' => WWW_DIR,
	'urlDir' => 'AppMachine',
);

// Spustenie aplikacie
$configurator = new \AppMachine\Configurator($settings);
$configurator->runApplication();
