<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Impl\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{

    protected $model;
    public function getAll()
    {
       return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function destroy($id)
    {
        $this->model->where("id",$id)->delete();
    }
}
