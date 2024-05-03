<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $attributes = [
        'seats' => '{
            "D": {
                "01": {"type": "economy", "status": "available"},
                "02": {"type": "economy", "status": "available"},
                "03": {"type": "economy", "status": "available"},
                "04": {"type": "economy", "status": "available"},
                "05": {"type": "economy", "status": "available"},
                "06": {"type": "economy", "status": "available"},
                "07": {"type": "economy", "status": "available"},
                "08": {"type": "economy", "status": "available"},
                "09": {"type": "economy", "status": "available"},
                "10": {"type": "economy", "status": "available"},
                "11": {"type": "economy", "status": "available"},
                "12": {"type": "economy", "status": "available"},
                "13": {"type": "economy", "status": "available"},
                "14": {"type": "economy", "status": "available"},
                "15": {"type": "economy", "status": "available"},
                "16": {"type": "economy", "status": "available"},
                "17": {"type": "economy", "status": "available"},
                "18": {"type": "economy", "status": "available"},
                "19": {"type": "economy", "status": "available"},
                "20": {"type": "economy", "status": "available"},
                "21": {"type": "economy", "status": "available"},
                "22": {"type": "economy", "status": "available"},
                "23": {"type": "economy", "status": "available"}
            },
            "C": {
                "01": {"type": "executive", "status": "available"},
                "02": {"type": "executive", "status": "available"},
                "03": {"type": "executive", "status": "available"},
                "04": {"type": "executive", "status": "available"},
                "05": {"type": "executive", "status": "available"},
                "06": {"type": "executive", "status": "available"},
                "07": {"type": "executive", "status": "available"},
                "08": {"type": "executive", "status": "available"},
                "09": {"type": "executive", "status": "available"},
                "10": {"type": "executive", "status": "available"},
                "11": {"type": "executive", "status": "available"},
                "12": {"type": "executive", "status": "available"},
                "13": {"type": "executive", "status": "available"},
                "14": {"type": "executive", "status": "available"},
                "15": {"type": "executive", "status": "available"},
                "16": {"type": "executive", "status": "available"},
                "17": {"type": "executive", "status": "available"},
                "18": {"type": "executive", "status": "available"},
                "19": {"type": "executive", "status": "available"},
                "20": {"type": "executive", "status": "available"},
                "21": {"type": "executive", "status": "available"},
                "22": {"type": "executive", "status": "available"},
                "23": {"type": "executive", "status": "available"}
            },
            "B": {
                "01": {"type": "executive", "status": "available"},
                "02": {"type": "executive", "status": "available"},
                "03": {"type": "executive", "status": "available"},
                "04": {"type": "executive", "status": "available"},
                "05": {"type": "executive", "status": "available"},
                "06": {"type": "executive", "status": "available"},
                "07": {"type": "executive", "status": "available"},
                "08": {"type": "executive", "status": "available"},
                "09": {"type": "executive", "status": "available"},
                "10": {"type": "executive", "status": "available"},
                "11": {"type": "executive", "status": "available"},
                "12": {"type": "executive", "status": "available"},
                "13": {"type": "executive", "status": "available"},
                "14": {"type": "executive", "status": "available"},
                "15": {"type": "executive", "status": "available"},
                "16": {"type": "executive", "status": "available"},
                "17": {"type": "executive", "status": "available"},
                "18": {"type": "executive", "status": "available"},
                "19": {"type": "executive", "status": "available"},
                "20": {"type": "executive", "status": "available"},
                "21": {"type": "executive", "status": "available"},
                "22": {"type": "executive", "status": "available"},
                "23": {"type": "executive", "status": "available"}
            },
            "A": {
                "01": {"type": "executive", "status": "available"},
                "02": {"type": "executive", "status": "available"},
                "03": {"type": "executive", "status": "available"},
                "04": {"type": "executive", "status": "available"},
                "05": {"type": "executive", "status": "available"},
                "06": {"type": "executive", "status": "available"},
                "07": {"type": "executive", "status": "available"},
                "08": {"type": "executive", "status": "available"},
                "09": {"type": "executive", "status": "available"},
                "10": {"type": "executive", "status": "available"},
                "11": {"type": "executive", "status": "available"},
                "12": {"type": "executive", "status": "available"},
                "13": {"type": "executive", "status": "available"},
                "14": {"type": "executive", "status": "available"},
                "15": {"type": "executive", "status": "available"},
                "16": {"type": "executive", "status": "available"},
                "17": {"type": "executive", "status": "available"},
                "18": {"type": "executive", "status": "available"},
                "19": {"type": "executive", "status": "available"},
                "20": {"type": "executive", "status": "available"},
                "21": {"type": "executive", "status": "available"},
                "22": {"type": "executive", "status": "available"},
                "23": {"type": "executive", "status": "available"}
            }
        }',
    ];
    use HasFactory;
}
