<?php
namespace Jarker\Entry\Services\Rule;

class UniqueCharacterCount implements Rule
{
    const DEFAULT_MINIMUM = 3;

    public function __construct(private readonly int $minimum = self::DEFAULT_MINIMUM) {}

    public function passes(string $code): bool
    {
        return count(count_chars($code, 1)) > $this->minimum;
    }
}
