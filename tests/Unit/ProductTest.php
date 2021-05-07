<?php

namespace Test;

use BaumanZoltan\Interfaces\ProductInterface;
use BaumanZoltan\Models\{Brand, Price, Product};
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testBaseSetters(): Product
    {
        $product = new Product();
        $product->setSku(12345);
        $product->setName('Test product');

        $this->assertEquals('12345', $product->getSku());
        $this->assertEquals('Test product', $product->getName());

        return $product;
    }

    /**
     * @param ProductInterface $product
     * @return ProductInterface
     * @depends testBaseSetters
     */
    public function testBrand(ProductInterface $product): ProductInterface
    {
        $brand = new Brand();
        $brand->setName('Test Brand');
        $product->setBrand($brand);

        $this->assertEquals($brand->getName(), $product->getBrand()->getName());

        return $product;
    }

    /**
     * @param ProductInterface $product
     * @depends testBrand
     */
    public function testPrice(ProductInterface $product)
    {
        $price = new Price();
        $price->setValue('123.45');
        $product->setPrice($price);

        $this->assertEquals(123.45, $product->getPrice()->getValue());
    }

    public function testProductVariation()
    {
        $tv = new Product\TvProduct([
            'type' => 'LED',
            'diagonal' => 138,
            'aspectRatio' => '16:9'
        ]);

        $this->assertEquals('LED', $tv->getType());
    }
}
