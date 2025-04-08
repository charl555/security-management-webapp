<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class resident_information extends Model
{
    protected $table = "resident_informations";

    protected $primaryKey = 'resident_information_id';

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone_number',
        'gender',
        'age',
        'date_of_birth',
        'place_of_birth',
        'occupation',
    ];

    protected static function booted()
    {
        static::saving(function ($model) {
            if ($model->date_of_birth) {
                $model->age = Carbon::parse($model->date_of_birth)->age;
            }
        });
    }

    public function address()
    {
        return $this->hasOne(resident_address::class, 'resident_information_id');
    }

}
