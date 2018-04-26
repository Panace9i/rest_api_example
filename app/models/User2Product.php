<?php

namespace Models;

class User2Product extends \Models\BaseModel
{
    public function initialize()
    {
        $this->hasOne("user_id", "\Models\User", "id", ['alias' => 'user']);
        $this->hasOne("product_id", "\Models\Product", "id", ['alias' => 'product']);
        $this->setSource('user2product');
    }
}