<?php

namespace BaumanZoltan\Abstracts;

use BaumanZoltan\BaseModel;
use BaumanZoltan\Interfaces\{BrandInterface, PriceInterface, ProductInterface};

abstract class ProductAbstract extends BaseModel implements ProductInterface
{
    protected float $capacityUsed = 1;
    protected string $sku;
    protected string $name;
    protected PriceInterface $price;
    protected BrandInterface $brand;

    /**
     * @return float
     */
    public function getCapacityUsed(): float
    {
        return $this->capacityUsed;
    }

    /**
     * @param float $capacityUsed
     * @return ProductAbstract
     */
    public function setCapacityUsed(float $capacityUsed): ProductAbstract
    {
        $this->capacityUsed = $capacityUsed;

        return $this;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return ProductAbstract
     */
    public function setSku(string $sku): ProductAbstract
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ProductAbstract
     */
    public function setName(string $name): ProductAbstract
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param PriceInterface $price
     * @return ProductAbstract
     */
    public function setPrice(PriceInterface $price): ProductAbstract
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return PriceInterface
     */
    public function getPrice(): PriceInterface
    {
        return $this->price;
    }

    /**
     * @param BrandInterface $brand
     * @return ProductAbstract
     */
    public function setBrand(BrandInterface $brand): ProductAbstract
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return BrandInterface
     */
    public function getBrand(): BrandInterface
    {
        return $this->brand;
    }
}
