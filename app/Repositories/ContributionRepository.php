<?php

namespace App\Repositories;

use App\Contribution;

class ContributionRepository extends BaseRepository
{
    public function __construct(Contribution $contribution)
    {
        $this->setModel($contribution);
    }

    public function getByCustomer($customerId)
    {
        return $this
            ->model
            ->where('customer_id', $customerId)
            ->get();
    }

    public function search($keywords, $limit = 10)
    {
        return $this
            ->model
            ->where('name', 'like', '%' . $keywords . '%')
            ->orWhere('code', $keywords)
            ->orWhere('email', $keywords)
            ->paginate($limit);
    }
}
