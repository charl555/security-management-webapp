<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class visitors extends Model
{
    protected $table = "visitors";

    protected $primaryKey = "visitor_id";
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'phone_number',
    ];
}
