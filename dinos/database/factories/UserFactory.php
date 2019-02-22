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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    return [
        'admin' => $faker->numberBetween(0,1),
        'name' => $faker->unique()->randomElement(['Fernando Alonso', 'Lewis Hamilton', 'Giancarlo Fisichella', 'Heikki Kovalainen', 'Felipe Massa', ' Kimi Räikkönen', ' Jenson Button', 'Rubens Barrichello', 'Nick Heidfeld', 'Robert Kubica']),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
    ];
});


$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(0,2),
        'name' => $faker->unique()->randomElement(['Ankylosaurus', 'Allosaurus', 'Brachiosaurus', 'Kentrosaurus', 'Megalosaurus', 'Oviraptor', 'Saurophaganax', 'Stegosaurus', 'Triceratops', 'Tyrannosaurus', 'Velociraptor', 'Zigongosaurus', 'Mamenchisaurus', 'Lesothosaurus', 'Iguanodon']),
        'type' => $faker->randomElement(['Herbivores', 'Omnivores', 'Carnivores']),
        'weight' => $faker->numberBetween(0.3, 30),
        'description' => $faker->sentence(50),
        'image_id' => $faker->unique()->numberBetween(0, 30)
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,10),
        'post_id' => $faker->numberBetween(1,15),
        'content' => $faker->sentence(30)
    ];
});

$factory->define(App\CommentReply::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,10),
        'comment_id' => $faker->numberBetween(1, 10),
        'content' => $faker->sentence(30)
    ];
});