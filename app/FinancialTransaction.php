<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class FinancialTransaction extends Model
{
    use SoftDeletes;

    protected $table = 'financial_transactions';

    protected $fillable = [
        'type',
        'chart_of_account_id',
        'value',
        'transaction_date',
        'description',
    ];

    public function chartOfAccount()
    {
        return $this->hasOne(ChartOfAccount::class, 'id', 'chart_of_account_id');
    }

    public function getTransactionDateAttribute($value)
    {
        $transactionDate = new Carbon($this->attributes['transaction_date']);

        return $transactionDate->format('Y-m-d');
    }

    public function getTransactionDateFormatedAttribute($value)
    {
        $transactionDate = new Carbon($this->attributes['transaction_date']);

        return $transactionDate->format('d/m/Y');
    }

    
}
