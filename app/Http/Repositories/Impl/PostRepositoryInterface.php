<?php

namespace App\Http\Repositories\Impl;

interface PostRepositoryInterface extends  BaseRepositoryInterface
{
    public function search($request);
}
