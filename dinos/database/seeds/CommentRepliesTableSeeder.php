<?php

use Illuminate\Database\Seeder;

class CommentRepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CommentReply::class, 30)->create();
    }
}
