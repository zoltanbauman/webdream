<?php

namespace BaumanZoltan\Models;

use BaumanZoltan\Interfaces\{ProductInterface, StorageItemResposneInterface};

class BusinessItem implements StorageItemResposneInterface
{
    protected float $quantity = 0;
    protected ProductInterface $product;

    /**
     * StorageItem constructor.
     * @param ProductInterface $product
     * @param float $quantity
     */
    public function __construct(ProductInterface $product, float $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @return ProductInterface
     */
    public function getProduct(): ProductInterface
    {
        return $this->product;
    }
}
