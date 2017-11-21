<?php

namespace App\Repositories;

use App\Customer;

class CustomerRepository extends BaseRepository
{
    public function __construct(Customer $customer)
    {
        $this->setModel($customer);
    }

    public function getActive($limit = 10)
    {
        return $this
            ->model
            ->where('active', 'Y')
            ->paginate($limit);
    }

    public function getActiveWithContribution($limit = 10)
    {
        return $this
            ->model
            ->select('customers.id', 'customers.code', 'customers.name', 'customers.email', 'customers.phone')
            ->join('contributions', 'contributions.customer_id', '=', 'customers.id', 'inner')
            ->where('active', 'Y')
            ->groupBy('customers.id')
            ->paginate($limit);
    }

    public function getDowned($limit = 10)
    {
        return $this
            ->model
            ->where('active', 'N')
            ->paginate($limit);
    }

    public function searchCustomersWithContribution($keywords, $limit = 10)
    {
        return $this
            ->model
            ->select('customers.id', 'customers.code', 'customers.name', 'customers.email', 'customers.phone')
            ->join('contributions', 'contributions.customer_id', '=', 'customers.id', 'inner')
            ->where(function($query) use ($keywords) {
                $query->where('name', 'like', '%' . $keywords['keywordName'] . '%')
                ->orWhere('code', $keywords['keywordCode']);
            })
            ->where(function($query) use ($keywords) {
                if(!empty($keywords['keywordDateFrom'])) {
                    $query->where('payment_date', '>=', $keywords['keywordDateFrom']);
                }

                if(!empty($keywords['keywordDateTo'])) {
                    $query->where('payment_date', '<=', $keywords['keywordDateTo']);
                }
            })
            ->groupBy('customers.id')
            ->paginate($limit);
    }
}
