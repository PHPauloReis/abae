<?php

namespace App\Repositories;

use App\ChartOfAccount;

class ChartOfAccountRepository extends BaseRepository
{
    public function __construct(ChartOfAccount $chartOfAccount)
    {
        $this->setModel($chartOfAccount);
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
