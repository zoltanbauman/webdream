<?php

namespace BaumanZoltan\Interfaces;

interface ProductInterface
{
    /**
     * @param string $sku
     * @return ProductInterface
     */
    public function setSku(string $sku): ProductInterface;

    /**
     * @return string
     */
    public function getSku(): string;

    /**
     * @param string $name
     * @return ProductInterface
     */
    public function setName(string $name): ProductInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param PriceInterface $price
     * @return ProductInterface
     */
    public function setPrice(PriceInterface $price): ProductInterface;

    /**
     * @return PriceInterface
     */
    public function getPrice(): PriceInterface;

    /**
     * @param BrandInterface $brand
     * @return ProductInterface
     */
    public function setBrand(BrandInterface $brand): ProductInterface;

    /**
     * @return BrandInterface
     */
    public function getBrand(): BrandInterface;

    /**
     * @return float
     */
    public function getCapacityUsed(): float;
}
