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

    public function getCategoryOfPost($postId)
    {
        $myCategories = [];
      $categories = DB::table('category_post')->where("post_id",$postId)->get("category_id");
      foreach ($categories as $category){
          $myCategories[] = $category->category_id;
      }
      return $myCategories;
    }
}
