<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function organisasi(){
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function divisi(){
        return $this->belongsTo(Division::class, 'division_id');
    }
}
