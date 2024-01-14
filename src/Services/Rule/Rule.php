<?php
namespace Jarker\Entry\Services\Rule;

interface Rule
{
    public function passes(string $code): bool;
}
