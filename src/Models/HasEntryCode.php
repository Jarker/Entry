<?php
namespace Jarker\Entry\Models;

trait HasEntryCode
{
    public function entryCode(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\Jarker\Entry\Models\EntryCode::class);
    }
}
