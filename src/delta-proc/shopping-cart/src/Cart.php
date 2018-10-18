<?php

namespace DeltaProc\ShoppingCart;

use DeltaProc\ShoppingCart\Contracts\Purchasable;

class Cart
{
    private $driver;

    /**
     * All items in the shopping cart
     *
     * @var array
     */
    private $items = [];

    public function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * Check if product exists in cart, increment if true.
     * Otherwise add a new item
     *
     * @param Purchasable $product
     * @return void
     */
    public function put(Purchasable $product)
    {
        $this->driver->put($product);
    }

    public function has($identifier)
    {
        $this->driver->has($identifier);
    }

    public function increment($identifier)
    {
        $this->driver->increment($identifier);
    }

    public function decrement($identifier)
    {
        $this->driver->decrement($identifier);
    }

    public function list() : array
    {
        return $this->driver->list();
    }

    public function persist()
    {
        $this->driver->persist();
    }
}
