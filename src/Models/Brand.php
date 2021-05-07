<?php

namespace BaumanZoltan\Models;

use BaumanZoltan\BaseModel;
use BaumanZoltan\Interfaces\BrandInterface;

/**
 * Class Brand
 * @package BaumanZoltan\Models
 */
class Brand extends BaseModel implements BrandInterface
{
    protected string $name = '';
    protected int $categoryLevel;

    public function setName(string $name): Brand
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setCategoryLevel(int $level): Brand
    {
        $this->categoryLevel = $level;

        return $this;
    }

    public function getCategoryLevel(): int
    {
        return $this->categoryLevel;
    }
}
