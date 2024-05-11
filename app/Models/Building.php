<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    function wards()
    {
        return $this->hasMany(Ward::class);
    }

    function floors()
    {
        return $this->hasMany(Floor::class);
    }
}
