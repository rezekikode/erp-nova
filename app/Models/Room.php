<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    function floor()
    {
        return $this->belongsTo(Floor::class);
    }

    function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    function beds()
    {
        return $this->hasMany(Bed::class);
    }
}
