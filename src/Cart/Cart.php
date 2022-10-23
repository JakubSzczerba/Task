<?php

declare(strict_types=1);

namespace Recruitment\Cart;

use Recruitment\Entity\Product;
use Recruitment\Cart\Item;
use Recruitment\Entity\Order;

class Cart 
{
    private int $id;

     /** @var Item[] */
     private array $items = [];

    public function addProduct(Product $product)
    {
        $item = new Item($product, $product->getMinimumQuantity());
        $this->items[] = $item;
    }

    public function getTotalPrice(): float
    {
        $prices = [];
        foreach ($this->getItems() as $item=>$value) {
            $prices[] = $value->getProduct()->getPrice();
        }
        $totalPrice = array_sum($prices);

        return $totalPrice;
    }

    public function getItems(): ?array
    {
        return $this->items;
    }

    public function getItem(int $index): Item
    {
        $itemsNumber = count($this->getItems());
        if (empty($this->getItems()) || $index >= $itemsNumber || $index < 0) {          
            throw new \OutOfBoundsException();
        }
        return $this->items[$index];
    }

    public function setQuantity()
    {}

    public function removeProduct($product)
    {    
        $items = $this->getItems();
        $key = array_search($product, $items);
        unset($items[$key]);
        
        return $items;
    }
    
    public function checkout(int $id): Order
    {
        $order = new Order();
        $order->setId($id);
        return $order;
    }
}