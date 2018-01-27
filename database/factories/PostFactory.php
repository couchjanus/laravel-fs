<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(App\Post::class, function (Faker $faker) {
	return [
    	'title' => $faker->sentence(),
    	'slug' => str_slug($faker->sentence()),
    	'content' => $faker->paragraph(20),
		'category_id' => $faker->numberBetween(1, 3),
		'post_thumbnail' => 'http://loremflickr.com/400/300?random='.rand(1, 100),
        
	];
});
