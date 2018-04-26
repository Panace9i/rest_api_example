<?php

/**
 * Registering an autoloader
 * @var \Phalcon\Config $config
 */
$loader = new \Phalcon\Loader();
$loader->registerNamespaces([
  'Models'             => APP_PATH . DIRECTORY_SEPARATOR . 'models',
  'Classes'            => APP_PATH . DIRECTORY_SEPARATOR . 'classes',
  'Classes\Exceptions' => APP_PATH . DIRECTORY_SEPARATOR . 'classes\exceptions',
  'Classes\Api'        => APP_PATH . DIRECTORY_SEPARATOR . 'classes\api',
]);


$loader->register();
