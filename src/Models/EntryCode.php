<?php
namespace Jarker\Entry\Models;

use Illuminate\Database\Eloquent;

class EntryCode extends Eloquent\Model
{
    public $fillable = ['code'];

    public function scopeHasCode(Eloquent\Builder $query, string $code): bool
    {
        return $query->where('code', $code)->exists();
    }
}
