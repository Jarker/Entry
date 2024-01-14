<?php
namespace Jarker\Entry\Services\Generator;

class Numeric implements Generator
{
    const DEFAULT_LENGTH = 6;

    public function __construct(private readonly int $length = self::DEFAULT_LENGTH) {}

    public function generate(): string
    {
        return (string) rand(pow(10, $this->length - 1), pow(10, $this->length) - 1);
    }
}
