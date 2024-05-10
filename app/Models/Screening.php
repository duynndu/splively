<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Screening extends Model
{
    use HasFactory;

    protected $casts = [
        'seats' => 'array'
    ];

    protected $attributes = [
        'seats' => '{
            "A": {
                "A_01": {"type": "economy", "status": "available"},
                "A_02": {"type": "economy", "status": "available"},
                "A_03": {"type": "economy", "status": "available"},
                "A_04": {"type": "economy", "status": "available"},
                "A_05": {"type": "economy", "status": "available"},
                "A_06": {"type": "economy", "status": "available"},
                "A_07": {"type": "economy", "status": "available"},
                "A_08": {"type": "economy", "status": "available"},
                "A_09": {"type": "economy", "status": "available"},
                "A_10": {"type": "economy", "status": "available"},
                "A_11": {"type": "economy", "status": "available"},
                "A_12": {"type": "economy", "status": "available"},
                "A_13": {"type": "economy", "status": "available"},
                "A_14": {"type": "economy", "status": "available"},
                "A_15": {"type": "economy", "status": "available"},
                "A_16": {"type": "economy", "status": "available"},
                "A_17": {"type": "economy", "status": "available"},
                "A_18": {"type": "economy", "status": "available"},
                "A_19": {"type": "economy", "status": "available"},
                "A_20": {"type": "economy", "status": "available"},
                "A_21": {"type": "economy", "status": "available"},
                "A_22": {"type": "economy", "status": "available"},
                "A_23": {"type": "economy", "status": "available"}
            },
            "B": {
                "B_01": {"type": "executive", "status": "available"},
                "B_02": {"type": "executive", "status": "available"},
                "B_03": {"type": "executive", "status": "available"},
                "B_04": {"type": "executive", "status": "available"},
                "B_05": {"type": "executive", "status": "available"},
                "B_06": {"type": "executive", "status": "available"},
                "B_07": {"type": "executive", "status": "available"},
                "B_08": {"type": "executive", "status": "available"},
                "B_09": {"type": "executive", "status": "available"},
                "B_10": {"type": "executive", "status": "available"},
                "B_11": {"type": "executive", "status": "available"},
                "B_12": {"type": "executive", "status": "available"},
                "B_13": {"type": "executive", "status": "available"},
                "B_14": {"type": "executive", "status": "available"},
                "B_15": {"type": "executive", "status": "available"},
                "B_16": {"type": "executive", "status": "available"},
                "B_17": {"type": "executive", "status": "available"},
                "B_18": {"type": "executive", "status": "available"},
                "B_19": {"type": "executive", "status": "available"},
                "B_20": {"type": "executive", "status": "available"},
                "B_21": {"type": "executive", "status": "available"},
                "B_22": {"type": "executive", "status": "available"},
                "B_23": {"type": "executive", "status": "available"}
            },
            "C": {
                "C_01": {"type": "executive", "status": "available"},
                "C_02": {"type": "executive", "status": "available"},
                "C_03": {"type": "executive", "status": "available"},
                "C_04": {"type": "executive", "status": "available"},
                "C_05": {"type": "executive", "status": "available"},
                "C_06": {"type": "executive", "status": "available"},
                "C_07": {"type": "executive", "status": "available"},
                "C_08": {"type": "executive", "status": "available"},
                "C_09": {"type": "executive", "status": "available"},
                "C_10": {"type": "executive", "status": "available"},
                "C_11": {"type": "executive", "status": "available"},
                "C_12": {"type": "executive", "status": "available"},
                "C_13": {"type": "executive", "status": "available"},
                "C_14": {"type": "executive", "status": "available"},
                "C_15": {"type": "executive", "status": "available"},
                "C_16": {"type": "executive", "status": "available"},
                "C_17": {"type": "executive", "status": "available"},
                "C_18": {"type": "executive", "status": "available"},
                "C_19": {"type": "executive", "status": "available"},
                "C_20": {"type": "executive", "status": "available"},
                "C_21": {"type": "executive", "status": "available"},
                "C_22": {"type": "executive", "status": "available"},
                "C_23": {"type": "executive", "status": "available"}
            },
            "D": {
                "D_01": {"type": "executive", "status": "available"},
                "D_02": {"type": "executive", "status": "available"},
                "D_03": {"type": "executive", "status": "available"},
                "D_04": {"type": "executive", "status": "available"},
                "D_05": {"type": "executive", "status": "available"},
                "D_06": {"type": "executive", "status": "available"},
                "D_07": {"type": "executive", "status": "available"},
                "D_08": {"type": "executive", "status": "available"},
                "D_09": {"type": "executive", "status": "available"},
                "D_10": {"type": "executive", "status": "available"},
                "D_11": {"type": "executive", "status": "available"},
                "D_12": {"type": "executive", "status": "available"},
                "D_13": {"type": "executive", "status": "available"},
                "D_14": {"type": "executive", "status": "available"},
                "D_15": {"type": "executive", "status": "available"},
                "D_16": {"type": "executive", "status": "available"},
                "D_17": {"type": "executive", "status": "available"},
                "D_18": {"type": "executive", "status": "available"},
                "D_19": {"type": "executive", "status": "available"},
                "D_20": {"type": "executive", "status": "available"},
                "D_21": {"type": "executive", "status": "available"},
                "D_22": {"type": "executive", "status": "available"},
                "D_23": {"type": "executive", "status": "available"}
            }
        }'
    ];
    protected $fillable = [
        'film_id',
        'room_number',
        'start_time',
        'end_time',
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
