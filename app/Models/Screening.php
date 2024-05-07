<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Screening extends Model
{
    use HasFactory;

    protected $attributes = [
        'seats' => '{
            "A": {
                "A_01": {"type": "economy", "status": "available", "error": false},
                "A_02": {"type": "economy", "status": "available", "error": false},
                "A_03": {"type": "economy", "status": "available", "error": false},
                "A_04": {"type": "economy", "status": "available", "error": false},
                "A_05": {"type": "economy", "status": "available", "error": false},
                "A_06": {"type": "economy", "status": "available", "error": false},
                "A_07": {"type": "economy", "status": "available", "error": false},
                "A_08": {"type": "economy", "status": "available", "error": false},
                "A_09": {"type": "economy", "status": "available", "error": false},
                "A_10": {"type": "economy", "status": "available", "error": false},
                "A_11": {"type": "economy", "status": "available", "error": false},
                "A_12": {"type": "economy", "status": "available", "error": false},
                "A_13": {"type": "economy", "status": "available", "error": false},
                "A_14": {"type": "economy", "status": "available", "error": false},
                "A_15": {"type": "economy", "status": "available", "error": false},
                "A_16": {"type": "economy", "status": "available", "error": false},
                "A_17": {"type": "economy", "status": "available", "error": false},
                "A_18": {"type": "economy", "status": "available", "error": false},
                "A_19": {"type": "economy", "status": "available", "error": false},
                "A_20": {"type": "economy", "status": "available", "error": false},
                "A_21": {"type": "economy", "status": "available", "error": false},
                "A_22": {"type": "economy", "status": "available", "error": false},
                "A_23": {"type": "economy", "status": "available", "error": false}
            },
            "B": {
                "B_01": {"type": "executive", "status": "available", "error": false},
                "B_02": {"type": "executive", "status": "available", "error": false},
                "B_03": {"type": "executive", "status": "available", "error": false},
                "B_04": {"type": "executive", "status": "available", "error": false},
                "B_05": {"type": "executive", "status": "available", "error": false},
                "B_06": {"type": "executive", "status": "available", "error": false},
                "B_07": {"type": "executive", "status": "available", "error": false},
                "B_08": {"type": "executive", "status": "available", "error": false},
                "B_09": {"type": "executive", "status": "available", "error": false},
                "B_10": {"type": "executive", "status": "available", "error": false},
                "B_11": {"type": "executive", "status": "available", "error": false},
                "B_12": {"type": "executive", "status": "available", "error": false},
                "B_13": {"type": "executive", "status": "available", "error": false},
                "B_14": {"type": "executive", "status": "available", "error": false},
                "B_15": {"type": "executive", "status": "available", "error": false},
                "B_16": {"type": "executive", "status": "available", "error": false},
                "B_17": {"type": "executive", "status": "available", "error": false},
                "B_18": {"type": "executive", "status": "available", "error": false},
                "B_19": {"type": "executive", "status": "available", "error": false},
                "B_20": {"type": "executive", "status": "available", "error": false},
                "B_21": {"type": "executive", "status": "available", "error": false},
                "B_22": {"type": "executive", "status": "available", "error": false},
                "B_23": {"type": "executive", "status": "available", "error": false}
            },
            "C": {
                "C_01": {"type": "executive", "status": "available", "error": false},
                "C_02": {"type": "executive", "status": "available", "error": false},
                "C_03": {"type": "executive", "status": "available", "error": false},
                "C_04": {"type": "executive", "status": "available", "error": false},
                "C_05": {"type": "executive", "status": "available", "error": false},
                "C_06": {"type": "executive", "status": "available", "error": false},
                "C_07": {"type": "executive", "status": "available", "error": false},
                "C_08": {"type": "executive", "status": "available", "error": false},
                "C_09": {"type": "executive", "status": "available", "error": false},
                "C_10": {"type": "executive", "status": "available", "error": false},
                "C_11": {"type": "executive", "status": "available", "error": false},
                "C_12": {"type": "executive", "status": "available", "error": false},
                "C_13": {"type": "executive", "status": "available", "error": false},
                "C_14": {"type": "executive", "status": "available", "error": false},
                "C_15": {"type": "executive", "status": "available", "error": false},
                "C_16": {"type": "executive", "status": "available", "error": false},
                "C_17": {"type": "executive", "status": "available", "error": false},
                "C_18": {"type": "executive", "status": "available", "error": false},
                "C_19": {"type": "executive", "status": "available", "error": false},
                "C_20": {"type": "executive", "status": "available", "error": false},
                "C_21": {"type": "executive", "status": "available", "error": false},
                "C_22": {"type": "executive", "status": "available", "error": false},
                "C_23": {"type": "executive", "status": "available", "error": false}
            },
            "D": {
                "D_01": {"type": "executive", "status": "available", "error": false},
                "D_02": {"type": "executive", "status": "available", "error": false},
                "D_03": {"type": "executive", "status": "available", "error": false},
                "D_04": {"type": "executive", "status": "available", "error": false},
                "D_05": {"type": "executive", "status": "available", "error": false},
                "D_06": {"type": "executive", "status": "available", "error": false},
                "D_07": {"type": "executive", "status": "available", "error": false},
                "D_08": {"type": "executive", "status": "available", "error": false},
                "D_09": {"type": "executive", "status": "available", "error": false},
                "D_10": {"type": "executive", "status": "available", "error": false},
                "D_11": {"type": "executive", "status": "available", "error": false},
                "D_12": {"type": "executive", "status": "available", "error": false},
                "D_13": {"type": "executive", "status": "available", "error": false},
                "D_14": {"type": "executive", "status": "available", "error": false},
                "D_15": {"type": "executive", "status": "available", "error": false},
                "D_16": {"type": "executive", "status": "available", "error": false},
                "D_17": {"type": "executive", "status": "available", "error": false},
                "D_18": {"type": "executive", "status": "available", "error": false},
                "D_19": {"type": "executive", "status": "available", "error": false},
                "D_20": {"type": "executive", "status": "available", "error": false},
                "D_21": {"type": "executive", "status": "available", "error": false},
                "D_22": {"type": "executive", "status": "available", "error": false},
                "D_23": {"type": "executive", "status": "available", "error": false}
            }
        }'
    ];
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
