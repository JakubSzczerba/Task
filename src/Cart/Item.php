<?php

declare(strict_types=1);

namespace Recruitment\Cart;

use Recruitment\Entity\Product;
use Recruitment\Cart\Exception\QuantityTooLowException;

class Item
{
    public function __construct(Product $product, int $quantity)
    {   
        if($quantity < $product->getMinimumQuantity()) {
            throw new \InvalidArgumentException();
        } 

        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = new Product();
    }
  
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        if ($quantity < $this->product->getMinimumQuantity()) {          
            throw new QuantityTooLowException();
        }

        $this->quantity = $quantity;
    }   

    public function getTotalPrice()
    {
        $price = $this->getProduct()->getPrice();
        return ($this->quantity) * $price;
    }
}
