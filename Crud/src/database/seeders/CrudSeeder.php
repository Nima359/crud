<?php

namespace Nima\Crud\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Nima\Crud\App\Models\Post;


class CrudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Post::factory (10)->create() ;
        
        $this->call (Post::class) ;
        Model::reguard () ;
        
        
//        factory(Post::class , 10)->create()->each(function ($p) {
//          $p->comments()->save(factory(Post::class)->make()) ;
//        });
        
    }
}
