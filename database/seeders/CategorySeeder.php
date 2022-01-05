<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = "Lập trình web";
        $category->save();

        $category = new Category();
        $category->name = "Kiểm thử";
        $category->save();

        $category = new Category();
        $category->name = "DevOps";
        $category->save();

        $category = new Category();
        $category->name = "Thiết kế";
        $category->save();
    }
}
