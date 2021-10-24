<?php

namespace Nima\Crud\Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nima\Crud\App\Models\Post;


class CrudFactory extends Factory {
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Post::class;
  
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition () {
    return [
      'title' => $this->faker->sentence (10) ,
      'comment' => $this->faker->text () ,
      'user_email' => $this->faker->safeEmail () ,
      'post_id' => $this->faker->randomNumber () ,
      'user_id' => 1 ,
      'publish' => 1 ,
      'created_at' => now () ,
      'updated_at' => now () ,
    ];
  }
  /*
    public function definition () {
      $factory->define(Post::class , function (Faker\Generator $faker) {
        return [
          'title' => $this->faker->sentence (10) ,
          'comment' => $this->faker->text () ,
          'user_email' => $this->faker->safeEmail () ,
          'post_id' => $this->faker->randomNumber (999) ,
          'user_id' => 1 ,
          'publish' => 1 ,
          'created_at' => now () ,
          'updated_at' => now () ,
        ];
      });
  }
  */
  
  /**
   * Indicate that the model's email address should be unverified.
   *
   * @return \Illuminate\Database\Eloquent\Factories\Factory
   */
  public function unverified () {
    return $this->state (function (array $attributes) {
      return [
//        'email_verified_at' => null ,
      ];
    });
  }
}
