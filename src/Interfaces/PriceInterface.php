<?php

namespace BaumanZoltan\Interfaces;

interface PriceInterface
{
    /**
     * @param float $value
     * @return PriceInterface
     */
    public function setValue(float $value): PriceInterface;

    /**
     * @return float
     */
    public function getValue(): float;
}
