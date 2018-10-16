<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use DeltaProc\ShoppingCart\Contracts\Purchasable;

class Product extends Model implements Purchasable
{
    /**
     * Get the product display title
     *
     * @return String
     */
    public function getLineTitle() : String
    {
        return $this->name;
    }

    /**
     * Get the product display description
     *
     * @return String
     */
    public function getLineDescription() : String
    {
        return $this->description;
    }

    /**
     * Get the unique identifier for the product
     *
     *
     * @return String
     */
    public function getLineIdentifier() : String
    {
        return (String) $this->id;
    }

    /**
     * Get the price for this item
     *
     * @return Integer
     */
    public function getLinePrice() : Integer
    {
        $this->price;
    }
}
