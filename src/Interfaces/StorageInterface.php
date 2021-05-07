<?php

namespace BaumanZoltan\Interfaces;

use BaumanZoltan\Exceptions\NotEnoughStorageQuantityException;

interface StorageInterface
{
    /**
     * @param string $name
     * @return StorageInterface
     */
    public function setName(string $name): StorageInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $address
     * @return StorageInterface
     */
    public function setAddress(string $address): StorageInterface;

    /**
     * @return string
     */
    public function getAddress(): string;

    /**
     * @param float $capacity
     * @return StorageInterface
     */
    public function setCapacity(float $capacity): StorageInterface;

    /**
     * @return float
     */
    public function getCapacity(): float;

    /**
     * @param ProductInterface $product
     * @param float|int $quantity
     * @return float
     */
    public function add(ProductInterface $product, float $quantity = 1): float;

    /**
     * @param ProductInterface $product
     * @param float $quantity
     * @return float
     * @throws NotEnoughStorageQuantityException
     */
    public function remove(ProductInterface $product, float $quantity): float;

    /**
     * @param float|int $capacityNeed
     * @return bool
     */
    public function hasEnoughSpace(float $capacityNeed = 1): bool;

    /**
     * @return float
     */
    public function getUsedCapacity(): float;

    /**
     * @return float
     */
    public function getFreeCapacity(): float;

    /**
     * @return array|ProductInterface[]
     */
    public function getProducts(): array;
}
