<?php

namespace DeltaProc\ShoppingCart\Drivers;

use DeltaProc\ShoppingCart\Contracts\Purchasable;
use DeltaProc\ShoppingCart\Contracts\DriverInterface;

class SessionDriver implements DriverInterface
{
    private $session;

    public function __construct()
    {
        $this->session = app()->make(\Illuminate\Contracts\Session\Session::class);
        if ($this->session->has('shopping_cart_items')) {
            $this->items = $this->session->get('shopping_cart_items');
        }
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
        $identifier = $product->getLineIdentifier();

        if ($this->has($identifier)) {
            $this->increment($identifier);
        } else {
            $this->items[$identifier] = new LineItem($product, 1);
        }
        $this->persist();
    }

    /**
     * Check if a product with given identifier exists
     *
     * @param [type] $identifier
     * @return boolean
     */
    public function has($identifier)
    {
        return array_key_exists($identifier, $this->items);
    }

    /**
     * Incement a product in the cart
     *
     * @param [type] $identifier
     * @return void
     */
    public function increment($identifier)
    {
        $this->items[$identifier]->increment();
    }

    /**
     * Decrement a product in the cart
     *
     * @param [type] $identifier
     * @return void
     */
    public function decrement($identifier)
    {
        $this->items[$identifier]->decrement();
    }

    /**
     * Return a listing of all items
     *
     * @return array
     */
    public function list() : array
    {
        return Collection::make($this->items)->toArray();
    }

    /**
     * Persist the current list
     *
     * @return void
     */
    public function persist()
    {
        $this->session->put('shopping_cart_items', $this->items);
    }
}
