<?php

namespace DeltaProc\ShoppingCart\Contracts;

interface Purchasable
{
    /**
     * Get the product display title
     *
     * @return string
     */
    public function getLineTitle() : string;

    /**
     * Get the product display description
     *
     * @return string
     */
    public function getLineDescription() : string;

    /**
     * Get the unique identifier for the product
     *
     *
     * @return string
     */
    public function getLineIdentifier() : string;

    /**
     * Get the price for this item
     *
     * @return int
     */
    public function getLinePrice() : int;
}
