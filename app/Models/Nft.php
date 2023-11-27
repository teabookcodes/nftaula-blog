<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nft extends Model
{
    use HasFactory;

    protected $guarded = ['is_highlighted', 'is_featured'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function savedNfts(): HasMany
    {
        return $this->hasMany(SavedNft::class, 'nft_id');
    }
}
