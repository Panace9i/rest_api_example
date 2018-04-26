<?php

namespace Models;

class Product extends \Models\BaseModel
{
    public function initialize()
    {
        $this->hasMany("id", "\Models\User2Product", "product_id", ['alias' => 'user2product']);
        $this->setSource('product');
    }
}