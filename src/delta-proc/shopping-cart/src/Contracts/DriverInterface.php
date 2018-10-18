<?php

namespace DeltaProc\ShoppingCart\Contracts;

use DeltaProc\ShoppingCart\Contracts\Purchasable;

interface DriverInterface
{
    
    /**
     * Check if product exists in cart, increment if true.
     * Otherwise add a new item
     *
     * @param Purchasable $product
     * @return void
     */
    public function put(Purchasable $product);

    /**
     * Check if a product with given identifier exists
     *
     * @param [type] $identifier
     * @return boolean
     */
    public function has($identifier);

    /**
     * Incement a product in the cart
     *
     * @param [type] $identifier
     * @return void
     */
    public function increment($identifier);

    /**
     * Decrement a product in the cart
     *
     * @param [type] $identifier
     * @return void
     */
    public function decrement($identifier);

    /**
     * Return a listing of all items
     *
     * @return array
     */
    public function list() : array;

    /**
     * Persist the current list
     *
     * @return void
     */
    public function persist();
}
