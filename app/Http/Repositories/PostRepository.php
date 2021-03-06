<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Impl\PostRepositoryInterface;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    protected $table = "posts";

    public function getAll($paginate = 5)
    {
        $posts = Post::paginate($paginate);
        return $posts ;
    }

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function delete($id)
    {
        $post = Post::query()->findOrFail($id);
        $post->delete();
    }

    public function search($request)
    {
        if ($request->searchPost !== null) {
            return Post::with('categories')->where("title","like",'%'. $request->searchPost.'%')->paginate(5);
        }else{
            return Post::with('categories')->paginate(5);
        }
    }
}
