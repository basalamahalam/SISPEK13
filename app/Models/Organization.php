<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function divisi(){
        return $this->hasMany(Division::class);
    }

    public function anggota(){
        return $this->hasMany(Anggota::class);
    }

}