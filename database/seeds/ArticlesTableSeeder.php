<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seed the database table articles with 30 data entris
        //App\Article is the model
        //update the databaseSeeder file as well
        factory(App\Article::class, 30)->create();
    }
}
