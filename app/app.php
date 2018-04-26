<?php

use Models\User;
use Models\Product;
use Classes\Exceptions\NotFoundException;
use Classes\Exceptions\NotAllowedException;
use Classes\Exceptions\AlreadyAddException;
use Classes\Exceptions\AuthException;
use Classes\Api\Api;

$api = new Api($app);

$app->get('/products', function () {
    return Product::find()->toArray();
});

$app->get('/order', function () use ($api) {
    $result = [];
    foreach ($api->getUserByRequest()->user2product as $order) {
        array_push($result, $order->product);
    }

    return $result;
});

$app->post('/order/{id}', function ($id) use ($api) {
    if ($api->getUserByRequest()->getOrderById($id)) {
        throw new AlreadyAddException("Order already added");
    }

    $exists = Product::findFirst($id);
    if (!$exists) {
        throw new NotFoundException('Product is not exists');
    }

    return $api->getUserByRequest()->addOrderById($id);
});

$app->delete('/order/{id}', function ($id) use ($api) {
    $order = $api->getUserByRequest()->getOrderById($id);
    if (!$order) {
        throw new NotFoundException("Order is not exists");
    }

    return $order->delete();
});

$app->notFound(function () use ($app) {
    throw new NotAllowedException("Method not Allowed");
});

$app->before(function () use ($api) {
    if (!$api->getUserByRequest()) {
        throw new AuthException('Unauthorized');
    }
});

$app->after(function () use ($app) {
    $app->response->setStatusCode(200);
    $app->response->setJsonContent([
      'request'    => [
        'headers' => $app->request->getHeaders(),
        'params'  => $app->request->getQuery(),
      ],
      'result'     => $app->getReturnedValue(),
      'error'      => false,
      'error_desc' => null,
      'error_code' => null,
    ]);
    $app->response->send();
});

$app->error(function (Exception $error) use ($app) {
    $app->response->setStatusCode($error->getCode());
    $app->response->setJsonContent([
      'request'    => [
        'headers' => $app->request->getHeaders(),
        'params'  => $app->request->getQuery(),
      ],
      'result'     => $app->getReturnedValue(),
      'error'      => true,
      'error_desc' => $error->getMessage(),
      'error_code' => $error->getCode(),
    ]);
    $app->response->send();
});
