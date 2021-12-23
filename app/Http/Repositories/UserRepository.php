<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Impl\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function create($data)
    {
        $this->model->create($data);
    }

    public function getPostOfUser($userId)
    {
        $user = $this->getById($userId);
        return $user->posts;
    }
}
