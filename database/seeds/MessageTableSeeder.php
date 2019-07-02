<?php

use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\App\Models\Message::create([
            'body' => $i . '番目のテキスト'
        ]);
    }
}
