<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'deck_id',
    ];

    public function deck(): BelongsTo
    {
        return $this->belongsTo(Deck::class, 'deck_id');
    }
}
