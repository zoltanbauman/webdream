<?php

namespace BaumanZoltan\Abstracts;

use BaumanZoltan\BaseModel;
use BaumanZoltan\Interfaces\BusinessInterface;
use BaumanZoltan\Interfaces\BusinessProductsResponseInterface;
use BaumanZoltan\Interfaces\ProductInterface;
use BaumanZoltan\Interfaces\StorageInterface;

abstract class BusinessAbstract extends BaseModel implements BusinessInterface
{
    /**
     * @var array|StorageInterface[]
     */
    protected array $storages = [];

    /**
     * @return array|StorageInterface
     */
    public function getStorages(): array
    {
        return $this->storages;
    }

    /**
     * @param array $storages
     * @return BusinessAbstract
     */
    public function setStorages(array $storages): BusinessAbstract
    {
        $this->storages = $storages;
        return $this;
    }

    /**
     * @param StorageInterface ...$storage
     * @return BusinessAbstract
     */
    abstract public function addStorage(StorageInterface ...$storage): BusinessAbstract;

    /**
     * @param ProductInterface $product
     * @param float $quantity
     * @return BusinessAbstract
     */
    abstract public function putInProduct(ProductInterface $product, float $quantity): BusinessAbstract;

    /**
     * @param ProductInterface $product
     * @param float $quantity
     * @return BusinessAbstract
     */
    abstract public function takeOutProduct(ProductInterface $product, float $quantity): BusinessAbstract;

    /**
     * @return BusinessProductsResponseInterface
     */
    abstract public function getProducts(): BusinessProductsResponseInterface;

    /**
     * @return float
     */
    abstract public function getFreeCapacity(): float;
}
