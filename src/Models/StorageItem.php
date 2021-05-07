<?php

namespace BaumanZoltan\Models;

use BaumanZoltan\Exceptions\NotEnoughStorageQuantityException;
use BaumanZoltan\Interfaces\{ProductInterface, StorageItemInterface, StorageItemResposneInterface};

class StorageItem implements StorageItemInterface, StorageItemResposneInterface
{
    protected float $quantity = 0;
    protected ProductInterface $product;

    /**
     * StorageItem constructor.
     * @param ProductInterface|null $product
     * @param float|int $quantity
     */
    public function __construct(
        ProductInterface $product = null,
        float $quantity = 0
    )
    {
        $this->setProduct($product);
        $this->setQuantity($quantity);
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     * @return StorageItem
     */
    public function setQuantity(float $quantity): StorageItem
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @param float $quantity
     * @return StorageItem
     */
    public function addQuantity(float $quantity): StorageItem
    {
        $this->quantity += $quantity;

        return $this;
    }

    /**
     * @param float $quantity
     * @return StorageItem
     * @throws NotEnoughStorageQuantityException
     */
    public function removeQuantity(float $quantity): StorageItem
    {
        if ( $this->quantity < $quantity ) {
            throw new NotEnoughStorageQuantityException();
        }
        $this->quantity -= $quantity;

        return $this;
    }

    /**
     * @return ProductInterface
     */
    public function getProduct(): ProductInterface
    {
        return $this->product;
    }

    /**
     * @param ProductInterface $product
     * @return StorageItem
     */
    public function setProduct(ProductInterface $product): StorageItem
    {
        $this->product = $product;

        return $this;
    }
}
