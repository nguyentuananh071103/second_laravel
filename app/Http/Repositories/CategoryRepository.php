<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Impl\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

}
