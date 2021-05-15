<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Model;
use App\Model\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => implode('-',$faker->words(3)),
    ];
});
