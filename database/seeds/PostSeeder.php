<?php

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
        //
        DB::table('posts')->insert([
            'title' => 'Test',
            'description' => 'test',
           
        ]);

    }
}
