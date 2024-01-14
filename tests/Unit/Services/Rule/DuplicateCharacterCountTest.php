<?php
namespace Unit\Services\Rule;

use Jarker\Entry\Services\Rule;

class DuplicateCharacterCountTest extends \Orchestra\Testbench\TestCase
{
    private Rule\DuplicateCharacterCount $object;
    const MAXIMUM = 3;

    public function setUp(): void
    {
        parent::setUp();
        $this->object = new Rule\DuplicateCharacterCount(self::MAXIMUM);
    }

    public function testPasses_givenGreaterThanMaximumDuplicateCharacters_returnsFalse()
    {
        $this->assertFalse($this->object->passes('111135'));
        $this->assertFalse($this->object->passes('737797'));
        $this->assertFalse($this->object->passes('090300'));
    }

    public function testPasses_givenLessThanOrEqualToDuplicateCharacters_returnsTrue()
    {
        $this->assertTrue($this->object->passes('135794'));
        $this->assertTrue($this->object->passes('102938'));
        $this->assertTrue($this->object->passes('293847'));
    }
}
