<?php
namespace Jarker\Entry\Services\Rule;

class Palindrome implements Rule
{
    public function passes(string $code): bool
    {
        return $code !== strrev($code);
    }
}
