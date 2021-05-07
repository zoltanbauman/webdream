<?php

namespace BaumanZoltan\Abstracts;

use BaumanZoltan\BaseModel;
use BaumanZoltan\Exceptions\NotEnoughStorageQuantityException;
use BaumanZoltan\Interfaces\{ProductInterface, StorageInterface, StorageItemInterface};

abstract class StorageAbstract extends BaseModel implements StorageInterface
{
    protected string $name;
    protected string $address;
    protected float $capacity = 0;
    protected array $products = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return StorageAbstract
     */
    public function setName(string $name): StorageAbstract
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return StorageAbstract
     */
    public function setAddress(string $address): StorageAbstract
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return float
     */
    public function getCapacity(): float
    {
        return $this->capacity;
    }

    /**
     * @param float $capacity
     * @return StorageAbstract
     */
    public function setCapacity(float $capacity): StorageAbstract
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * @return StorageItemInterface[]|array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param ProductInterface $product
     * @param float|int $quantity
     * @return float
     */
    abstract public function add(ProductInterface $product, float $quantity = 1): float;

    /**
     * @param ProductInterface $product
     * @param float $quantity
     * @return float
     * @throws NotEnoughStorageQuantityException
     */
    abstract public function remove(ProductInterface $product, float $quantity): float;

    /**
     * @param float|int $capacityNeed
     * @return bool
     */
    abstract public function hasEnoughSpace(float $capacityNeed = 1): bool;

    /**
     * @return float
     */
    abstract public function getUsedCapacity(): float;

    /**
     * @return float
     */
    abstract public function getFreeCapacity(): float;
}
