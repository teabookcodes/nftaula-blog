<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedNft extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nft_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nft()
    {
        return $this->belongsTo(Nft::class);
    }
}
