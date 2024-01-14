<?php
namespace Unit\Services;

use Jarker\Entry\Services\EntryCode;

class EntryCodeTest extends \Orchestra\Testbench\TestCase
{
    private EntryCode $object;
    private \Phake\IMock $mockGenerator;

    public function setUp(): void
    {
        parent::setUp();
        $this->object = new EntryCode($this->mockGenerator = \Phake::mock(\Jarker\Entry\Services\Generator\Generator::class));
    }

    public function testGenerate_returnsCodeAsString()
    {
        \Phake::when($this->mockGenerator)->generate()->thenReturn('112233');

        $this->assertEquals('112233', $this->object->generate());

        \Phake::verify($this->mockGenerator)->generate();
    }

    public function testGenerate_givenRule_returnsCode()
    {
        \Phake::when($this->mockGenerator)->generate()
            ->thenReturn('112233')
            ->thenReturn('334455');

        $mockRule = \Phake::mock(\Jarker\Entry\Services\Rule\Rule::class);

        \Phake::when($mockRule)->passes('112233')->thenReturn(false);
        \Phake::when($mockRule)->passes('334455')->thenReturn(true);

        $this->object->addRule($mockRule);
        $this->assertEquals('334455', $this->object->generate());

        \Phake::verify($this->mockGenerator, \Phake::times(2))->generate();
        \Phake::verify($mockRule)->passes('112233');
        \Phake::verify($mockRule)->passes('334455');
    }
}
