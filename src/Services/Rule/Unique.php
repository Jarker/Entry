<?php
namespace Jarker\Entry\Services\Rule;

class Unique implements Rule
{
    public function __construct(private readonly \Jarker\Entry\Models\EntryCode $model) {}

    public function passes(string $code): bool
    {
        return !$this->model->where('code', $code)->exists();
    }
}
