<?php
require_once('bootstrap.php');

use Phalcon\Mvc\Micro;

try {
    $app = new Micro($di);

    include APP_PATH . '/app.php';

    $app->handle();
} catch (\Exception $e) {

}
