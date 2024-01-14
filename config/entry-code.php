<?php

return [
    'generator' => \Jarker\Entry\Services\Generator\Numeric::class,
    'rules' => [
        [\Jarker\Entry\Services\Rule\Palindrome::class, []],
        [\Jarker\Entry\Services\Rule\ConsecutiveCharacterCount::class, []],
        [\Jarker\Entry\Services\Rule\DuplicateCharacterCount::class, []],
        [\Jarker\Entry\Services\Rule\Unique::class, [new \Jarker\Entry\Models\EntryCode()]],
        [\Jarker\Entry\Services\Rule\UniqueCharacterCount::class, [3]]
    ]
];
