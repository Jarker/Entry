<?php
namespace Jarker\Entry\Services\Rule;

class DuplicateCharacterCount implements Rule
{
    const DEFAULT_MAXIMUM = 3;

    public function __construct(private readonly int $count = self::DEFAULT_MAXIMUM) {}

    public function passes(string $code): bool
    {
        foreach (count_chars($code, 1) as $i => $occurrences) {
            if ($occurrences > $this->count) {
                return false;
            }
        }

        return true;
    }
}
