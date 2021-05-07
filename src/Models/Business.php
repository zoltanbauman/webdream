<?php

namespace BaumanZoltan\Models;

use BaumanZoltan\Abstracts\BusinessAbstract;
use BaumanZoltan\Exceptions\NotEnoughStorageQuantityException;
use BaumanZoltan\Exceptions\NotEnoughStorageSpaceException;
use BaumanZoltan\Responses\BusinessProductsResponse;
use BaumanZoltan\Interfaces\{ProductInterface, StorageInterface};

class Business extends BusinessAbstract
{
    public function addStorage(StorageInterface ...$storage): Business
    {
        foreach ($storage as $storageObject) {
            $this->storages[] = $storageObject;
        }

        return $this;
    }

    /**
     * @param ProductInterface $product
     * @param float $quantity
     * @return Business
     * @throws NotEnoughStorageSpaceException
     */
    public function putInProduct(ProductInterface $product, float $quantity): Business
    {
        $storageIterator = 0;

        if ($this->getFreeCapacity() >= ($product->getCapacityUsed() * $quantity)) {
            while ($quantity > 0) {
                $storage = $this->storages[$storageIterator++];
                $quantity = $storage->add($product, $quantity);
            }
        } else {
            throw new NotEnoughStorageSpaceException();
        }

        return $this;
    }

    /**
     * @param ProductInterface $product
     * @param float $quantity
     * @return Business
     * @throws NotEnoughStorageQuantityException
     */
    public function takeOutProduct(ProductInterface $product, float $quantity): Business
    {
        if ($this->getProducts()->getQuantity($product->getSku()) >= $quantity) {
            $storageIterator = 0;
            while ($quantity > 0) {
                $storage = $this->storages[$storageIterator++];
                $quantity = $storage->remove($product, $quantity);
            }
        } else {
            throw new NotEnoughStorageQuantityException();
        }

        return $this;
    }

    /**
     * @return BusinessProductsResponse
     */
    public function getProducts(): BusinessProductsResponse
    {
        return new BusinessProductsResponse($this);
    }

    /**
     * @return float
     */
    public function getFreeCapacity(): float
    {
        $freeCapacity = 0;
        foreach ($this->getStorages() as $storage) {
            $freeCapacity += $storage->getFreeCapacity();
        }
        return $freeCapacity;
    }
}
