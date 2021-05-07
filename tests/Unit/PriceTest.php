<?php

namespace Test;

use BaumanZoltan\Models\Price;
use PHPUnit\Framework\TestCase;

class PriceTest extends TestCase
{
    /**
     * Test Price value convertion to float
     */
    public function testValue()
    {
        $price = new Price();
        $price->setValue('123.45');

        $this->assertEquals(123.45, $price->getValue());
    }
}
