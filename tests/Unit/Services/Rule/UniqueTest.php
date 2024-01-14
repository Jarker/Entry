<?php
namespace Unit\Services\Rule;

use Jarker\Entry\Services\Rule;

class UniqueTest extends \Orchestra\Testbench\TestCase
{
    private Rule\Unique $object;
    private \Phake\IMock $mockModel;
    const MAXIMUM = 3;

    public function setUp(): void
    {
        parent::setUp();
        $this->object = new Rule\Unique($this->mockModel = \Phake::mock(\Jarker\Entry\Models\EntryCode::class));
    }

    public function testPasses_givenCodeAlreadyExists_returnsFalse()
    {
        $code = 'ENTRY-CODE';

        \Phake::when($this->mockModel)->where('code', $code)->thenReturnSelf();
        \Phake::when($this->mockModel)->exists()->thenReturn(true);

        $this->assertFalse($this->object->passes($code));

        \Phake::verify($this->mockModel)->where('code', $code);
        \Phake::verify($this->mockModel)->exists();
    }

    public function testPasses_givenCodeDoesNotExist_returnsTrue()
    {
        $code = 'ENTRY-CODE';

        \Phake::when($this->mockModel)->where('code', $code)->thenReturnSelf();
        \Phake::when($this->mockModel)->exists()->thenReturn(false);

        $this->assertTrue($this->object->passes($code));

        \Phake::verify($this->mockModel)->where('code', $code);
        \Phake::verify($this->mockModel)->exists();
    }
}
