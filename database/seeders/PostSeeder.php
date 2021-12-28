<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post;
        $post->title = "Thằng bạn thân";
        $post->content = "Mặc dù thằng này chơi rất xấu, nhưng nó là bnaj thân";
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "Gia đình của tôi";
        $post->content = "Một gia đình có 4 người, chúng tôi sống với nhau rất hạnh phúc";
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "Em người yêu";
        $post->content = "Cô ấy rất xinh đẹp tuyệt vời, đáng yêu";
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "Chuyện ma king dị";
        $post->content = "Một câu chuyện rất king dị, chúng tôi rất sợ bộ phim đó";
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "Thuở thơ ấu";
        $post->content = "Chúng tôi hay cởi chuồng tắm mưa, bắn bi, nhảy dây";
        $post->user_id = 2;
        $post->save();

        $post = new Post;
        $post->title = "Chuyện cổ tích";
        $post->content = "Bé bé quàng khăn đỏ, có chiếc khăn màu đo đỏ";
        $post->user_id = 2;
        $post->save();

        $post = new Post;
        $post->title = "Nộp Pi";
        $post->content = "Mỗi ngày tôi phải nộp pi đều đặn 10k";
        $post->user_id = 2;
        $post->save();

        $post = new Post;
        $post->title = "Lo lắng";
        $post->content = "Tôi không có gì lo lắng cho hiện tại, mọi thứ thật tuyệt vời";
        $post->user_id = 3;
        $post->save();

    }
}
