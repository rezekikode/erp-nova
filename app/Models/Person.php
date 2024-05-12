<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
