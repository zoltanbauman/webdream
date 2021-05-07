<?php

namespace BaumanZoltan\Models;

use BaumanZoltan\Abstracts\StorageAbstract;
use BaumanZoltan\Exceptions\NotEnoughStorageQuantityException;
use BaumanZoltan\Interfaces\{ProductInterface, StorageItemInterface};

class Storage extends StorageAbstract
{

    public function getProductQuantity() {
        $quantity = 0;

        foreach ($this->getProducts() as $product) {
            $quantity += $product->getQuantity();
        }

        return$quantity;
    }

    /**
     * @param ProductInterface $product
     * @param float $quantity
     * @return float
     */
    public function add(ProductInterface $product, float $quantity = 1): float
    {
        $returnQuantity = 0;
        if ( !$this->hasEnoughSpace($quantity * $product->getCapacityUsed()) ) {
            $quantitySpace = floor($this->getFreeCapacity() / $product->getCapacityUsed());
            $returnQuantity = $quantity - $quantitySpace;
            $quantity = $quantitySpace;
        }

        if ( !( $storageItem = $this->getStorageItem($product) ) ) {
            $storageItem = new StorageItem($product);

            $this->products[$product->getSku()] = $storageItem;
        }

        $storageItem->addQuantity($quantity);

        return $returnQuantity;
    }

    /**
     * @param ProductInterface $product
     * @param float $quantity
     * @return float
     * @throws NotEnoughStorageQuantityException
     */
    public function remove(ProductInterface $product, float $quantity): float
    {
        $returnQuantity = 0;
        if ( $storageItem = $this->getStorageItem($product) ) {
            $returnQuantity = max(0, $quantity - $storageItem->getQuantity());
            $quantity -= $returnQuantity;
            $storageItem->removeQuantity($quantity);
        }

        return $returnQuantity;
    }

    /**
     * @param ProductInterface $product
     * @return StorageItemInterface|null
     */
    protected function getStorageItem(ProductInterface $product): ?StorageItemInterface
    {
        return $this->products[$product->getSku()] ?? null;
    }

    /**
     * @return float
     */
    public function getUsedCapacity(): float
    {
        $summ = 0;
        foreach ($this->getProducts() as $storageItem) {
            $summ += $storageItem->getProduct()->getCapacityUsed() * $storageItem->getQuantity();
        }
        return $summ;
    }

    /**
     * @return float
     */
    public function getFreeCapacity(): float
    {
        return $this->getCapacity() - $this->getUsedCapacity();
    }

    /**
     * @param float $capacityNeed
     * @return bool
     */
    public function hasEnoughSpace(float $capacityNeed = 1): bool
    {
        return $capacityNeed <= $this->getFreeCapacity();
    }
}
