<?php

namespace App\Tests;

use App\Form\MaxNumberType;
use PHPUnit\Framework\TestCase;

class MaxNamberTest extends TestCase
{
    public function testFunctionMaxNumber()
    {
        $function = new MaxNumberType();

        $this->assertSame(1, $function->getMaxNumber(1));
        $this->assertSame(4, $function->getMaxNumber(10));
        $this->assertSame(3, $function->getMaxNumber(5));
        $this->assertSame(21, $function->getMaxNumber(100));
        $this->assertSame(3, $function->getMaxNumber(7));
        $this->assertSame(5, $function->getMaxNumber(12));
        $this->assertSame(4, $function->getMaxNumber(9));
        $this->assertSame(411, $function->getMaxNumber(9000));
        $this->assertSame(2584, $function->getMaxNumber(99999));
        $this->assertSame(13, $function->getMaxNumber(60));
    }
}
