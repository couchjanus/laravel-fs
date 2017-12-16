<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categoriesData = array(
            array('name' => 'artisan'),
            array('name' => 'php'),
            array('name' => 'laravel'),
        );

        $postsData = array(
            array('title' => 'php artisan', 'content' => 'php artisan -- это набор консольных комманд поставляющихся с laravel, облегчающих разработку на laravel, весь список доступных комманд можно посмотерть выполнив', 'category_id' => 1),
            array('title' => 'набор консольных комманд', 'content' => 'php artisan -- это набор консольных комманд поставляющихся с laravel, облегчающих разработку на laravel, весь список доступных комманд можно посмотерть выполнив', 'category_id' => 2),
            array('title' => 'список доступных комманд', 'content' => 'php artisan -- это набор консольных комманд поставляющихся с laravel, облегчающих разработку на laravel, весь список доступных комманд можно посмотерть выполнив', 'category_id' => 3),
        );

        // Удаляем предыдущие данные
        DB::table('categories')->delete();
        DB::table('posts')->delete();

        foreach ($categoriesData as $cat) {

            DB::table('categories')->insert([
                'name' => $cat['name']
            ]);
        }

        foreach ($postsData as $post) {

            DB::table('posts')->insert([
                'title' => $post['title'], 'content' => $post['content'],'category_id' => $post['category_id']
            ]);
        }


    }
}
