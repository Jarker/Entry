<?php
namespace Unit\Services\Rule;

use Jarker\Entry\Services\Rule;

class UniqueCharacterCountTest extends \Orchestra\Testbench\TestCase
{
    private Rule\UniqueCharacterCount $object;
    const MINIMUM = 3;

    public function setUp(): void
    {
        parent::setUp();
        $this->object = new Rule\UniqueCharacterCount(self::MINIMUM);
    }

    public function testPasses_givenGreaterThanMinimumUniqueCharacters_returnsFalse()
    {
        $this->assertFalse($this->object->passes('663633'));
        $this->assertFalse($this->object->passes('955959'));
        $this->assertFalse($this->object->passes('454545'));
        $this->assertFalse($this->object->passes('123123'));
    }

    public function testPasses_givenGreaterThanMinimumUniqueCharacters_returnsTrue()
    {
        $this->assertTrue($this->object->passes('123456'));
        $this->assertTrue($this->object->passes('222345'));
        $this->assertTrue($this->object->passes('1232526789'));
    }
}
