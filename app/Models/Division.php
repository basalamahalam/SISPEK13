<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function organisasi(){
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function event(){
        return $this->hasMany(Event::class);
    }

    public function anggota(){
        return $this->hasMany(Anggota::class);
    }
}
