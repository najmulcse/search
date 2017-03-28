<?php

use Illuminate\Database\Seeder;

class MySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chat=new App\Chat;
        $chat->user_id=1;
        $chat->message='have a nice tour';
        $chat->receiver_id=2;
        $chat->save();
    }
}
