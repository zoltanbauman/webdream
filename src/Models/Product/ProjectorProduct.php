<?php

namespace BaumanZoltan\Models\Product;

class ProjectorProduct extends VisualDisplayProduct
{
    protected string $brightness;

    /**
     * @return string
     */
    public function getAspectRatio(): string
    {
        return $this->aspectRatio;
    }

    /**
     * @param string $aspectRatio
     * @return ProjectorProduct
     */
    public function setAspectRatio(string $aspectRatio): ProjectorProduct
    {
        $this->aspectRatio = $aspectRatio;
        return $this;
    }
}
