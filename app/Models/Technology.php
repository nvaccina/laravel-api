<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    public function work(){
        return $this->belongsToMany(Work::class);
    }
    /*
    public function type(){
        return $this->hasMany(Type::class);
    }*/
}
