<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedCollection extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'collection_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
}
