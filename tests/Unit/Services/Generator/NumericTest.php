<?php
namespace Unit\Services\Generator;

use Jarker\Entry\Services\Generator;

class NumericTest extends \Orchestra\Testbench\TestCase
{
    public function testGenerate_givenVaryingLengths_returnsNumericStringWithLength()
    {
        $this->assertEquals(6, strlen((new Generator\Numeric(6))->generate()));
        $this->assertEquals(12, strlen((new Generator\Numeric(12))->generate()));
        $this->assertEquals(3, strlen((new Generator\Numeric(3))->generate()));
        $this->assertEquals(16, strlen((new Generator\Numeric(16))->generate()));
    }
}
