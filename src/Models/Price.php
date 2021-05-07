<?php


namespace BaumanZoltan\Models;

use BaumanZoltan\Interfaces\PriceInterface;

class Price implements PriceInterface
{
    protected float $value;

    public function setValue(float $value): Price
    {
        $this->value = $value;

        return $this;
    }

    public function getValue(): float
    {
        return $this->value;
    }
}
