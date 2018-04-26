<?php

namespace Classes\Api;

use Models\User;

class Api
{
    private $micro;

    public function __construct(\Phalcon\Mvc\Micro $entity)
    {
        $this->micro = $entity;
    }

    public function getUserByRequest()
    {
        if (!$this->getSession()->get($this->getRequestLogin())) {
            $user = User::findFirst([
              'conditions' => 'login = :user_id: and password = :product_id:',
              'bind'       => ['user_id' => $this->getRequestLogin(), 'product_id' => $this->getRequestPassword()],
            ]);
            if ($user) {
                $this->getSession()->set($this->getRequestLogin(), $user);
            }
        }

        return $this->getSession()->get($this->getRequestLogin());
    }

    private function getRequestLogin()
    {
        return $this->getRequest()->getServer('PHP_AUTH_USER');
    }

    private function getRequestPassword()
    {
        return $this->getRequest()->getServer('PHP_AUTH_PW');
    }

    private function getRequest()
    {
        return $this->micro->request;
    }

    private function getSession()
    {
        return $this->micro->getDI()->getShared('session');
    }
}