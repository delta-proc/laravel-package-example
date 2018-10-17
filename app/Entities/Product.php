<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use DeltaProc\ShoppingCart\Contracts\Purchasable;

class Product extends Model implements Purchasable
{
    /**
     * Get the product display title
     *
     * @return string
     */
    public function getLineTitle() : string
    {
        return $this->name;
    }

    /**
     * Get the product display description
     *
     * @return string
     */
    public function getLineDescription() : string
    {
        return $this->description;
    }

    /**
     * Get the unique identifier for the product
     *
     *
     * @return string
     */
    public function getLineIdentifier() : string
    {
        return (string) $this->id;
    }

    /**
     * Get the price for this item
     *
     * @return int
     */
    public function getLinePrice() : int
    {
        return int_val($this->price);
    }
}
