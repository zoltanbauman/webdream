<?php

namespace BaumanZoltan\Interfaces;

interface BrandInterface
{
    /**
     * @param string $name
     * @return BrandInterface
     */
    public function setName(string $name): BrandInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param int $level
     * @return BrandInterface
     */
    public function setCategoryLevel(int $level): BrandInterface;

    /**
     * @return int
     */
    public function getCategoryLevel(): int;
}
