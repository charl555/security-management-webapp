<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class resident_address extends Model
{
    protected $table = "resident_address";  

    protected $primaryKey = "resident_address_id";

    protected $fillable = [
        'resident_information_id',
        "home_address",
        "street_name",
        "phase_number",
    ];

    public function resident()
{
    return $this->belongsTo(resident_information::class, 'resident_information_id');
}
}
