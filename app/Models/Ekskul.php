<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function scopefilter($query, array $filters){
        $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query->where('name','like','%'. $search . '%'));
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
