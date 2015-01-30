<?php

define("WWW_DIR", __DIR__);
define("APP_DIR", WWW_DIR . '/app');

include(APP_DIR . '/libs/AppMachine/Configurator.php');
include(APP_DIR . '/libs/AppMachine/Debager/Debagger.php');

$settings = array(
	'baseDir' => WWW_DIR,
	'urlDir' => 'AppMachine',
);

// Spustenie aplikacie
$configurator = new \AppMachine\Configurator($settings);
$configurator->runApplication();
