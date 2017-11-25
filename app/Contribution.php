<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Contribution extends Model
{
    use SoftDeletes;

    protected $dates = [
        'payment_date',
    ];

    protected $fillable = [
        'customer_id',
        'payment_date',
        'value',
        'month',
        'year',
        'received_by'
    ];
}
