<?php

namespace App\Repositories;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract function getModel();

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function getAll($limit)
    {
        return $this->model::latest('id')->paginate($limit);
    }

    public function findById($id)
    {
        // TODO: Implement findById() method.
        return $this->model->findOrFail($id);
    }

    public function create($attributes = [])
    {
        // TODO: Implement create() method.
        return $this->model->create($attributes);
    }

    public function update($attributes = [], $id)
    {
        // TODO: Implement update() method.
        $result = $this->findById($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $result = $this->findById($id);
        if ($result) {
            $result->delete();
            return true;
        }
        return false;
    }
}
