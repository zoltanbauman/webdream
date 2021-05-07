<?php

namespace Test;

use BaumanZoltan\Interfaces\StorageInterface;
use BaumanZoltan\Models\{Product, Storage};
use PHPUnit\Framework\TestCase;

class StorageTest extends TestCase
{
    /**
     * @return Storage
     */
    public function testBaseMethods(): Storage
    {
        $storage = new Storage();
        $storage
            ->setName('Test storage')
            ->setAddress('1234 Budapest, Street u. 123.')
            ->setCapacity(10);

        $this->assertEquals('Test storage', $storage->getName());
        $this->assertEquals('1234 Budapest, Street u. 123.', $storage->getAddress());
        $this->assertEquals(10, $storage->getCapacity());

        return $storage;
    }

    /**
     * @param StorageInterface $storage
     * @return StorageInterface
     * @depends testBaseMethods
     */
    public function testProductCount(StorageInterface $storage): StorageInterface
    {
        $product = new Product();
        $product
            ->setName('First product')
            ->setSku('12345');

        $storage->add($product, 4);
        $storage->add($product, 3);

        $this->assertCount(1, $storage->getProducts());

        return $storage;
    }

    /**
     * @param Storage $storage
     * @return StorageInterface
     * @depends testProductCount
     */
    public function testProductQuantity(Storage $storage): StorageInterface
    {
        $this->assertEquals(
            7,
            $storage->getProductQuantity()
        );

        return $storage;
    }

    /**
     * @param Storage $storage
     * @return StorageInterface
     * @depends testProductCount
     */
    public function testMultipleProductsCountAndQuantit(Storage $storage): StorageInterface
    {
        $product2 = new Product();
        $product2
            ->setSku('abcd')
            ->setName('Second product');

        $storage->add($product2);

        $this->assertCount(2, $storage->getProducts());
        $this->assertEquals(
            8,
            $storage->getProductQuantity()
        );

        return $storage;
    }

    /**
     * @param Storage $storage
     * @depends testProductCount
     */
    public function testRemoveProductQuantity(Storage $storage)
    {
        $product = new Product();
        $product
            ->setName('First product')
            ->setSku('12345');

        $storage->remove($product, 2);

        $this->assertCount(2, $storage->getProducts());
        $this->assertEquals(
            6,
            $storage->getProductQuantity()
        );
        $this->assertTrue($storage->hasEnoughSpace(), "Not enough space in storage");
    }

    /**
     * @param StorageInterface $storage
     * @depends testProductCount
     */
    public function testUsedCapacity(StorageInterface $storage)
    {
        $this->assertEquals(6, $storage->getUsedCapacity());

        /**
         * @var Product $firstProduct
         */
        $products = $storage->getProducts();
        $firstProduct = $products[array_keys($products)[0]]->getProduct();
        $firstProduct->setCapacityUsed(2.5);

        $this->assertEquals(13.5, $storage->getUsedCapacity());
        $this->assertFalse($storage->hasEnoughSpace(), "It must be not enough space in storage");
    }
}
