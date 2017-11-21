<?php

namespace App\Repositories;

use App\Administrator;

class AdministratorRepository extends BaseRepository
{
    public function __construct(Administrator $administrator)
    {
        $this->setModel($administrator);
    }

    public function search($keywords, $limit = 10)
    {
        return $this
            ->model
            ->where('name', 'like', '%' . $keywords . '%')
            ->orWhere('email', 'like', '%' . $keywords . '%')
            ->orWhere('username', 'like', '%' . $keywords . '%')
            ->paginate($limit);
    }
}