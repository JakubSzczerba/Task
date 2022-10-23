<?php

declare(strict_types=1);

namespace Recruitment\Entity;

use Recruitment\Cart\Cart;

class Order extends Cart
{
    private int $id;
    
    public function getId()
    {
        return $this->id;
    }

    public function setId(?int $id)
    {
        $this->id = $id;
    }

    public function getDataForView()
    {
    }    
}