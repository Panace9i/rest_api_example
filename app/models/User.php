<?php

namespace Models;

class User extends \Models\BaseModel
{
    public function initialize()
    {
        $this->hasMany("id", "\Models\User2Product", "user_id", ['alias' => 'user2product']);
        $this->setSource('user');
    }

    public function getOrderById(int $id)
    {
        return User2Product::findFirst([
          'conditions' => 'user_id = :user_id: and product_id = :product_id:',
          'bind'       => ['user_id' => $this->id, 'product_id' => $id],
        ]);
    }

    public function addOrderById(int $id): bool
    {
        $order = new User2Product();
        return $order->save([
          'user_id'    => $this->id,
          'product_id' => $id,
        ]);
    }
}