<?php
error_reporting(E_ALL & ~E_NOTICE);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
define('CONFIG_PATH', APP_PATH . '/config');

$gConfig = new \Phalcon\Config\Adapter\Ini(CONFIG_PATH . DIRECTORY_SEPARATOR . "config.ini");

require BASE_PATH . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
require CONFIG_PATH . DIRECTORY_SEPARATOR . 'loader.php';
require CONFIG_PATH . DIRECTORY_SEPARATOR . 'services.php';

$gConfig = new \Phalcon\Config\Adapter\Ini(CONFIG_PATH . DIRECTORY_SEPARATOR . "config.ini");
