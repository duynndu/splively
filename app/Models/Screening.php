<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Screening extends Model
{
    use HasFactory;

    protected $fillable = [
        'film_id',
        'room_number',
        'seats'
    ];

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class);
    }

    public function scopeSearch($query, $search)
    {
        $query->whereRelation('film','id', 'like', "%{$search}%");
    }
}
