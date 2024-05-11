<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;

    public function refOrganisationType()
    {
        return $this->belongsTo(RefOrganisationType::class);
    }    

    public function address()
    {
        return $this->belongsToMany(Address::class)->withPivot('from_date');
    }
}
