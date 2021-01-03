<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(\App\Category::class,5)->create()->each(function ($category){
//            $category->products()->save(factory(App\Product::class)->make());
//        });
        factory(\App\Category::class,5)->create();
    }
}
