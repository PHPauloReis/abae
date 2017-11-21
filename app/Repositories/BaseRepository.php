<?php

namespace App\Repositories;

class BaseRepository
{
    protected $model;

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function paginate($limit)
    {
        return $this->model->paginate($limit);
    }

    public function insert($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        $entity = $this->model->find($id);
        $entity->fill($data);
        return $entity->save();
    }
}