<?php

namespace Test;

use BaumanZoltan\Interfaces\BrandInterface;
use BaumanZoltan\Models\Brand;
use PHPUnit\Framework\TestCase;

class BrandTest extends TestCase
{
    /**
     * test Name setter and getter
     *
     * @return Brand
     */
    public function testName(): Brand
    {
        $brand = new Brand();
        $brand
            ->setName('TestBrand')
            ->setCategoryLevel(1)
        ;

        $this->assertEquals('TestBrand', $brand->getName());

        return $brand;
    }

    /**
     * @param BrandInterface $brand
     * @depends testName
     */
    public function testCategoryLevel(BrandInterface $brand)
    {
        $this->assertEquals(1, $brand->getCategoryLevel());
    }
}
