<?php

namespace BaumanZoltan\Models\Product;

use BaumanZoltan\Abstracts\ProductAbstract;

class MobilePhoneProduct extends ProductAbstract
{
    protected string $simCardType;
    protected string $displayResolution;
    protected float $ram;

    /**
     * @return string
     */
    public function getSimCardType(): string
    {
        return $this->simCardType;
    }

    /**
     * @param string $simCardType
     * @return MobilePhoneProduct
     */
    public function setSimCardType(string $simCardType): MobilePhoneProduct
    {
        $this->simCardType = $simCardType;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayResolution(): string
    {
        return $this->displayResolution;
    }

    /**
     * @param string $displayResolution
     * @return MobilePhoneProduct
     */
    public function setDisplayResolution(string $displayResolution): MobilePhoneProduct
    {
        $this->displayResolution = $displayResolution;
        return $this;
    }

    /**
     * @return float
     */
    public function getRam(): float
    {
        return $this->ram;
    }

    /**
     * @param float $ram
     * @return MobilePhoneProduct
     */
    public function setRam(float $ram): MobilePhoneProduct
    {
        $this->ram = $ram;
        return $this;
    }
}
