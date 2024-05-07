<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug'];
    protected $table = 'genres';
    public function films()
    {
        return $this->hasMany(Film::class);
    }
    
    public function scopeSearch($query, $search): void
    {
        $query->where('name', 'like', "%{$search}%");
    }
}
