<?php

namespace BaumanZoltan\Models\Product;

class VisualDisplayProduct extends ElectricProduct
{
    protected string $aspectRatio;
    protected string $resolution;

    /**
     * @return string
     */
    public function getAspectRatio(): string
    {
        return $this->aspectRatio;
    }

    /**
     * @param string $aspectRatio
     * @return VisualDisplayProduct
     */
    public function setAspectRatio(string $aspectRatio): VisualDisplayProduct
    {
        $this->aspectRatio = $aspectRatio;
        return $this;
    }

    /**
     * @return string
     */
    public function getResolution(): string
    {
        return $this->resolution;
    }

    /**
     * @param string $resolution
     * @return VisualDisplayProduct
     */
    public function setResolution(string $resolution): VisualDisplayProduct
    {
        $this->resolution = $resolution;
        return $this;
    }
}
