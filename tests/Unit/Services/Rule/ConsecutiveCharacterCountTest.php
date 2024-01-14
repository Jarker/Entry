<?php
namespace Unit\Services\Rule;

use Jarker\Entry\Services\Rule;

class ConsecutiveCharacterCountTest extends \Orchestra\Testbench\TestCase
{
    private Rule\ConsecutiveCharacterCount $object;
    const MAXIMUM = 3;

    public function setUp(): void
    {
        parent::setUp();
        $this->object = new Rule\ConsecutiveCharacterCount(self::MAXIMUM);
    }

    public function testPasses_givenGreaterThanMaximumConsecutiveCharacters_returnsFalse()
    {
        $this->assertFalse($this->object->passes('123455'));
        $this->assertFalse($this->object->passes('432133'));
        $this->assertFalse($this->object->passes('056780'));
    }

    public function testPasses_givenLessThanOrEqualToConsecutiveCharacters_returnsTrue()
    {
        $this->assertTrue($this->object->passes('102938'));
        $this->assertTrue($this->object->passes('102938'));
        $this->assertTrue($this->object->passes('293847'));
    }
}
