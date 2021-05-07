<?php

namespace BaumanZoltan\Interfaces;

interface StorageItemResposneInterface
{
    /**
     * @return float
     */
    public function getQuantity(): float;

    /**
     * @return ProductInterface
     */
    public function getProduct(): ProductInterface;
}
