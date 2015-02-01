<?php

use AppMachine\Debugger\Debugger;

define("WWW_DIR", __DIR__);
define("APP_DIR", WWW_DIR . '/app');

include(APP_DIR . '/libs/AppMachine/Configurator.php');
include(APP_DIR . '/libs/AppMachine/Debugger/Debugger.php');

Debugger::enableDebug();

$settings = array(
	'baseDir' => WWW_DIR,
	'urlDir' => 'AppMachine',
);

// Spustenie aplikacie
$configurator = new \AppMachine\Configurator($settings);

$configurator->registerController('homepage', new HomepageController($configurator));
$configurator->registercontroller('test', new TestController($configurator));

$configurator->runApplication();
