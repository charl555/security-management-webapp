<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class resident_photo extends Model
{
    protected $table = "resident_photos";

    protected $primaryKey = "resident_photo_id";

    protected $fillable = [
        'resident_information_id',
        "resident_photo",
    ];


    public function resident()
    {
        return $this->belongsTo(resident_information::class, "resident_information_id");
    }

}


