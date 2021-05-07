<?php

namespace BaumanZoltan\Models\Product;

use BaumanZoltan\Abstracts\ProductAbstract;

abstract class ElectricProduct extends ProductAbstract
{
    protected string $type;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return ElectricProduct
     */
    public function setType(string $type): ElectricProduct
    {
        $this->type = $type;
        return $this;
    }

}
