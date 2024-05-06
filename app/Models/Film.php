<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = 'films';
    protected $casts = [
        'images' => 'array'
    ];
    protected $attributes = [
        'images' => '{
            "cover": "cover.jpg",
            "gallery": [
                "image1.jpg",
                "image2.jpg",
                "image3.jpg"
            ]
        }'
    ];
    use HasFactory;
}
