<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;    

    protected $casts = [
        'from_date' => 'date',
    ];

    public function organisation()
    {
        return $this->belongsToMany(Organisation::class)->withPivot('from_date');
    }
}
