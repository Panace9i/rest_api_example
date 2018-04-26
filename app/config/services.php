<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Collection\Manager;
use Phalcon\Session\Adapter\Files as Session;

$di = new FactoryDefault();

$di->setShared('config', function () use ($gConfig) {
    return $gConfig;
});

$di->set('db', function () {
    $config  = $this->getConfig();
    $dbclass = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;

    return new $dbclass([
      "host"     => $config->database->host,
      "username" => $config->database->username,
      "password" => $config->database->password,
      "dbname"   => $config->database->dbname,
      "charset"  => $config->database->charset,
    ]);
});

$di->setShared('session', function () {
    $session = new Session();

    $session->start();

    return $session;
});

$di->setShared('collectionManager', function () {
    return new Manager();
});
