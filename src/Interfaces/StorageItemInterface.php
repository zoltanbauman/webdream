<?php

namespace BaumanZoltan\Interfaces;

use BaumanZoltan\Exceptions\NotEnoughStorageQuantityException;

interface StorageItemInterface
{
    /**
     * @param float $quantity
     * @return StorageItemInterface
     */
    public function addQuantity(float $quantity): StorageItemInterface;

    /**
     * @param float $quantity
     * @return StorageItemInterface
     * @throws NotEnoughStorageQuantityException
     */
    public function removeQuantity(float $quantity): StorageItemInterface;
}
