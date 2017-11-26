<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Customer extends Model
{
    use SoftDeletes;

    protected $dates = [
        'date_of_birth',
        'discharge_date'
    ];

    protected $fillable = [
        'code',
        'name',
        'date_of_birth',
        'gender',
        'mothers_name',
        'fathers_name',
        'address',
        'district',
        'zipcode',
        'phone',
        'main_mobile',
        'secondary_mobile',
        'email',
        'diagnosis',
        'practice_day',
        'activity_location',
        'contribution_value',
        'indicated_by',
        'social_worker',
        'discharge_date'
    ];

    public function contributions()
    {
        return $this->hasMany(Contribution::class);
    }

    public function getAgeAttribute()
    {
        $dateOfBirth = new Carbon($this->attributes['date_of_birth']);

        return $dateOfBirth->age;
    }

    public function getDateOfBirthAttribute($value)
    {
        $dateOfBirth = new Carbon($this->attributes['date_of_birth']);

        return $dateOfBirth->format('Y-m-d');
    }

    public function getDischargeDateAttribute($value)
    {
        $dischargeDate = new Carbon($this->attributes['discharge_date']);

        return $dischargeDate->format('Y-m-d');
    }
}
