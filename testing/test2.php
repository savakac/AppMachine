<?php

// use \AppMachine\test;

// include(__DIR__ . '/test/test1.php');
include('database.php');
include('from.php');

// $test = new \AppMachine\test\test1();
// $test->runApplication();

new \test\Database();
new \test\user\testclass\connect\From();

echo DOG;