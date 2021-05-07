<?php

namespace BaumanZoltan\Responses;

use BaumanZoltan\Interfaces\BusinessInterface;
use BaumanZoltan\Interfaces\BusinessProductsResponseInterface;
use BaumanZoltan\Interfaces\StorageItemResposneInterface;
use BaumanZoltan\Models\BusinessItem;

class BusinessProductsResponse implements BusinessProductsResponseInterface
{
    protected BusinessInterface $business;
    protected array $products = [];
    protected array $quantities = [];
    protected array $storageItems = [];

    public function __construct(BusinessInterface $business)
    {
        $this->business = $business;

        $this->processProducts();
    }

    private function processProducts()
    {
        foreach ($this->business->getStorages() as $storage) {
            foreach ($storage->getProducts() as $storageItem) {
                $product = $storageItem->getProduct();
                $this->products[$product->getSku()] = $product;

                if (!isset($this->quantities[$product->getSku()])) $this->quantities[$product->getSku()] = 0;
                $this->quantities[$product->getSku()] += $storageItem->getQuantity();
            }
        }
    }

    /**
     * @param string $sku
     * @return int|mixed
     */
    public function getQuantity(string $sku)
    {
        return $this->quantities[$sku] ?? 0;
    }

    /**
     * @return array|BusinessItem[]
     */
    public function getProducts(): array
    {
        $productStorageItems = [];
        foreach ($this->products as $sku => $product) {
            $productStorageItems[] = new BusinessItem($product, $this->getQuantity($sku));
        }
        return $productStorageItems;
    }

    /**
     * @param string $sku
     * @return StorageItemResposneInterface|null
     */
    public function getProduct(string $sku): ?StorageItemResposneInterface
    {
        if (!isset($this->products[$sku])) return null;

        return new BusinessItem($this->products[$sku], $this->quantities[$sku]);
    }
}
