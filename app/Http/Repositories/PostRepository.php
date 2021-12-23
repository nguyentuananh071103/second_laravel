<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Impl\PostRepositoryInterface;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function __construct(Post $post)
    {
        $this->model = $post;
    }
}
