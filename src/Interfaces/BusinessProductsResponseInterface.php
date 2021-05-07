<?php

namespace BaumanZoltan\Interfaces;

interface BusinessProductsResponseInterface
{
    /**
     * @param string $sku
     * @return StorageItemResposneInterface|null
     */
    public function getProduct(string $sku): ?StorageItemResposneInterface;
}
