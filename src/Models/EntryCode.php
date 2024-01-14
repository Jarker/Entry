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

    public function scopeUnallocated(Eloquent\Builder $query): Eloquent\Builder
    {
        return $query->whereNull('user_id');
    }

    public function user(): Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
