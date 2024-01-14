<?php
namespace Unit\Services\Rule;

use Jarker\Entry\Services\Rule;

class PalindromeTest extends \Orchestra\Testbench\TestCase
{
    private Rule\Palindrome $object;

    public function setUp(): void
    {
        parent::setUp();
        $this->object = new Rule\Palindrome();
    }

    public function testPasses_givenPalindrome_returnsFalse()
    {
        $this->assertFalse($this->object->passes('235532'));
        $this->assertFalse($this->object->passes('730037'));
        $this->assertFalse($this->object->passes('998899'));
        $this->assertFalse($this->object->passes('101101'));
        $this->assertFalse($this->object->passes('600006'));
    }

    public function testPasses_givenNotAPalindrome_returnsTrue()
    {
        $this->assertTrue($this->object->passes('123456'));
        $this->assertTrue($this->object->passes('654321'));
        $this->assertTrue($this->object->passes('101102'));
        $this->assertTrue($this->object->passes('876203'));
        $this->assertTrue($this->object->passes('108473'));
    }
}
