<?php

namespace Test;

use BaumanZoltan\Interfaces\ProductInterface;
use BaumanZoltan\Exceptions\{NotEnoughStorageQuantityException, NotEnoughStorageSpaceException};
use BaumanZoltan\Models\{Business, Storage};
use BaumanZoltan\Models\Product\{MobilePhoneProduct, ProjectorProduct, TvProduct};
use PHPUnit\Framework\TestCase;

class BusinessTest extends TestCase
{
    protected Business $business;

    /**
     * @return Business
     */
    public function testAddStorages(): Business
    {
        $storages = $this->storageDataProvider();
        $business = new Business();

        foreach ($storages as $storage) {
            $business->addStorage($storage);
        }

        $this->assertCount(3, $business->getStorages());

        return $business;
    }

    /**
     * @depends      testAddStorages
     * @dataProvider productDataProvider
     */
    public function testHasEnoughStorageSpace($products, Business $business)
    {
        try {
            foreach ($products as $product) {
                $business->putInProduct($product[0], $product[1]);
            }
            $this->assertTrue(true);
        } catch (NotEnoughStorageSpaceException $e) {
            $this->assertTrue(false);
        }
    }

    /**
     * @depends      testAddStorages
     * @dataProvider productDataProvider
     */
    public function testHasNotEnoughStorageSpace($products, Business $business)
    {
        $this->expectException(NotEnoughStorageSpaceException::class);

        foreach ($products as $product) {
            $business->putInProduct($product[0], 6);
        }
    }

    /**
     * @depends      testAddStorages
     * @dataProvider productDataProvider
     */
    public function testTakeOutProductionSuccess($products, Business $business)
    {
        try {
            $business->takeOutProduct($products[0][0], 3);
            $this->assertTrue(true);
        } catch (NotEnoughStorageQuantityException $e) {
            $this->assertTrue(false);
        }
    }

    /**
     * @depends      testAddStorages
     * @dataProvider productDataProvider
     */
    public function testTakeOutProductionException($products, Business $business)
    {
        $this->expectException(NotEnoughStorageQuantityException::class);
        $business->takeOutProduct($products[0][0], 3);
    }

    /**
     * @depends testAddStorages
     */
    public function testBusinessProductsList(Business $business)
    {
        $this->displayBusinessSore($business);
        $this->assertTrue(true);
    }

    /**
     * @param Business $business
     */
    protected function displayBusinessSore(Business $business)
    {
        print "Aktuális raktár készlet: \n\r";
        $businessProductsResponse = $business->getProducts();
        foreach ($businessProductsResponse->getProducts() as $storageItem) {
            print $storageItem->getProduct()->getSku() . ': ' . $storageItem->getQuantity() . "\n\r";
        }
    }

    /**
     * @return array
     */
    public function storageDataProvider(): array
    {
        return [
            new Storage([
                'name' => 'First storage',
                'address' => '1st street 1.',
                'capacity' => 8,
            ]),
            new Storage([
                'name' => 'Second storage',
                'address' => '2st street 2.',
                'capacity' => 11,
            ]),
            new Storage([
                'name' => 'Third storage',
                'address' => '3st street 3.',
                'capacity' => 11,
            ])
        ];
    }

    /**
     * @return array|ProductInterface[]
     */
    public function productDataProvider(): array
    {
        $products = [];
        $products[] = [
            [
                [new TvProduct(['sku' => 'tv0001']), 5],
                [new TvProduct(['sku' => 'tv0002']), 5],
                [new ProjectorProduct(['sku' => 'pr0003']), 5],
                [new ProjectorProduct(['sku' => 'pr0004']), 5],
                [new MobilePhoneProduct(['sku' => 'mp0005']), 5],
                [new MobilePhoneProduct(['sku' => 'mp0006']), 5],
            ]
        ];
        return $products;
    }
}
