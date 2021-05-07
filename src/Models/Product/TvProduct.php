<?php

namespace BaumanZoltan\Models\Product;

class TvProduct extends VisualDisplayProduct
{
    protected float $diagonal;

    /**
     * @return float
     */
    public function getDiagonal(): float
    {
        return $this->diagonal;
    }

    /**
     * @param float $diagonal
     * @return TvProduct
     */
    public function setDiagonal(float $diagonal): TvProduct
    {
        $this->diagonal = $diagonal;
        return $this;
    }
}
