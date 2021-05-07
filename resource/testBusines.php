<?php

use BaumanZoltan\Exceptions\NotEnoughStorageSpaceException;
use BaumanZoltan\Models\{Business, Product\MobilePhoneProduct, Product\ProjectorProduct, Product\TvProduct, Storage};

$business = new Business();

$business->addStorage(
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
);

$products = [
    new TvProduct(['sku' => 'tv0001']),
    new TvProduct(['sku' => 'tv0002']),
    new ProjectorProduct(['sku' => 'pr0003']),
    new ProjectorProduct(['sku' => 'pr0004']),
    new MobilePhoneProduct(['sku' => 'mp0005']),
    new MobilePhoneProduct(['sku' => 'mp0006']),
];

try {
    $business
        ->putInProduct($products[0], 1)
        ->putInProduct($products[1], 2)
        ->putInProduct($products[2], 3)
        ->putInProduct($products[3], 4)
        ->putInProduct($products[4], 3)
        ->putInProduct($products[5], 2)
        ->putInProduct($products[0], 1)
        ->putInProduct($products[1], 2)
        ->putInProduct($products[2], 3)
        ->putInProduct($products[3], 4)
        ->putInProduct($products[4], 3)
        ->putInProduct($products[5], 2);
} catch (NotEnoughStorageSpaceException $exception) {
//    print_r($exception);
}

return $business;