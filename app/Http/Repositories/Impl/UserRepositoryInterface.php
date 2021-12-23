<?php

namespace App\Http\Repositories\Impl;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function create($data);

    public function getPostOfUser($userId);
}
