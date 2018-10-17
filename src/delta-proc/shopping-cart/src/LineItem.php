<?php
namespace DeltaProc\ShoppingCart;

use Illuminate\Contracts\Support\Arrayable;
use DeltaProc\ShoppingCart\Contracts\Purchasable;

class LineItem implements Arrayable
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
        $this->setAmount($this->amount + $by);
    }

    public function decrement($by = 1)
    {
        $this->setAmount($this->amount - $by);
    }

    public function getProduct() : Purchasable
    {
        return $this->product;
    }

    public function getAmount() : Integer
    {
        return $this->amount;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'amount' => $this->amount,
            'product' => $this->product
        ];
    }
}
