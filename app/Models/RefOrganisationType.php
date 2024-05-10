<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefOrganisationType extends Model
{
    use HasFactory;

    public function organisations()
    {
        return $this->hasMany(Organisation::class);
    }
}
