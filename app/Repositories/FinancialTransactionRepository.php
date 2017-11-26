<?php

namespace App\Repositories;

use App\FinancialTransaction;

class FinancialTransactionRepository extends BaseRepository
{
    public function __construct(FinancialTransaction $financialTransaction)
    {
        $this->setModel($financialTransaction);
    }

    public function getReceivable($limit = 10)
    {
        return $this->model->where('type', 1)->paginate($limit);
    }

    public function getPayables($limit = 10)
    {
        return $this->model->where('type', 2)->paginate($limit);
    }

    public function search($keywords, $limit = 10)
    {
        return $this
            ->model
            ->where('title', 'like', '%' . $keywords . '%')
            ->orWhere('description', 'like', '%' . $keywords . '%')
            ->paginate($limit);
    }
}
