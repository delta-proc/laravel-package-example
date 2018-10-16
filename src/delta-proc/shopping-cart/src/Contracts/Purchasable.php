<?php

namespace DeltaProc\ShoppingCart\Contracts;

interface Purchasable
{
    /**
     * Get the product display title
     *
     * @return String
     */
    public function getLineTitle() : String;

    /**
     * Get the product display description
     *
     * @return String
     */
    public function getLineDescription() : String;

    /**
     * Get the unique identifier for the product
     *
     *
     * @return String
     */
    public function getLineIdentifier() : String;

    /**
     * Get the price for this item
     *
     * @return Integer
     */
    public function getLinePrice() : Integer;
}
