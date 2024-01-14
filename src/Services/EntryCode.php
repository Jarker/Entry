<?php
namespace Jarker\Entry\Services;

class EntryCode
{
    /** @var \Jarker\Entry\Services\Rule\Rule[] */
    private array $rules = [];

    public function __construct(private readonly Generator\Generator $generator) {}

    public function addRule(Rule\Rule $rule): EntryCode
    {
        $this->rules[] = $rule;
        return $this;
    }

    public function generate(): string
    {
        $code = $this->generator->generate();

        foreach ($this->rules as $rule) {
            if (!$rule->passes($code)) {
                return $this->generate();
            }
        }

        return $code;
    }
}
