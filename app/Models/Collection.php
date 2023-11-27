<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    use HasFactory;

    protected $guarded = ['is_highlighted', 'is_featured'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function savedCollections(): HasMany
    {
        return $this->hasMany(SavedCollection::class, 'collection_id');
    }
}
