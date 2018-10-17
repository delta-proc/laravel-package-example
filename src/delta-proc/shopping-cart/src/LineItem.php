<?php
namespace DeltaProc\ShoppingCart;

use DeltaProc\ShoppingCart\Contracts\Purchasable;

class LineItem
{
    private $product;
    private $amount;
    
    public function __construct(Purchasable $product, $amount)
    {
        $this->product = $product;
        $this->amount = $amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function increment($by = 1)
    {
        $this->updateAmount($this->amount + $by);
    }

    public function decrement($by = 1)
    {
        $this->updateAmount($this->amount - $by);
    }

    public function getProduct() : Purchasable
    {
        return $this->product;
    }

    public function getAmount() : Integer
    {
        return $this->amount;
    }
}
