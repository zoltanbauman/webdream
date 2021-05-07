<?php

namespace BaumanZoltan\Interfaces;

use BaumanZoltan\Exceptions\NotEnoughStorageQuantityException;
use BaumanZoltan\Exceptions\NotEnoughStorageSpaceException;

interface BusinessInterface
{
    /**
     * @return array|StorageInterface[]
     */
    public function getStorages(): array;

    /**
     * @param StorageInterface ...$storage
     * @return BusinessInterface
     */
    public function addStorage(StorageInterface ...$storage): BusinessInterface;

    /**
     * @param ProductInterface $product
     * @param float $quantity
     * @return BusinessInterface
     * @throws NotEnoughStorageSpaceException
     */
    public function putInProduct(ProductInterface $product, float $quantity): BusinessInterface;

    /**
     * @param ProductInterface $product
     * @param float $quantity
     * @return BusinessInterface
     * @throws NotEnoughStorageQuantityException
     */
    public function takeOutProduct(ProductInterface $product, float $quantity): BusinessInterface;

    /**
     * @return BusinessProductsResponseInterface
     */
    public function getProducts(): BusinessProductsResponseInterface;

    /**
     * @return float
     */
    public function getFreeCapacity(): float;
}
