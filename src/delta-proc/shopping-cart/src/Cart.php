<?php

namespace DeltaProc\ShoppingCart;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use DeltaProc\ShoppingCart\Contracts\Purchasable;

class Cart
{
    /**
     * All items in the shopping cart
     *
     * @var array
     */
    private $items = [];

    public function __construct()
    {
        if (Session::has('shopping_cart_items')) {
            $this->items = Session::get('shopping_cart_items');
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

    public function has($identifier)
    {
        return array_key_exists($identifier, $this->items);
    }

    public function increment($identifier)
    {
        $this->items[$identifier]->increment();
    }

    public function decrement($identifier)
    {
        $this->items[$identifier]->decrement();
    }

    public function list() : array
    {
        return Collection::make($this->items)->toArray();
    }

    private function persist()
    {
        Session::put('shopping_cart_items', $this->items);
    }
}
