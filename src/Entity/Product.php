<?php

declare(strict_types=1);

namespace Recruitment\Entity;

use Recruitment\Entity\Exception\InvalidUnitPriceException;
use Recruitment\Entity\Exception\InvalidArgumentException;

class Product 
{
    private int $id;

    private string $name;

    private int $quantity;

    private float $price;

    public function __construct(int $quantity = 1)
    {
        $this->quantity = $quantity;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId(?int $id)
    {
        $this->id = $id;
    }

    public function getName(): ?int
    {
        return $this->id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    } 
    
    public function setUnitPrice(float $price)
    {
        if($price = 0) {
            throw new InvalidUnitPriceException();
        }

        $this->price = $price;
    }

    public function setMinimumQuantity(int $quantity)
    {
        if($quantity < 1) {
            throw new InvalidArgumentException();
        }
        $this->quantity = $quantity;
    }

    public function getMinimumQuantity(): ?int
    {
        return $this->quantity;
    }
}
