<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('posts')->insert([
            [
                'title' => "Bưu kiện 1",
                'content' => "Đây là bưu kiện",
                'publish_date' => "2023/01/01 13:30:30",
                'author' => 6,
                'image' => '1.png',
                'views' => 7,
                'status' => 0 
        ],
        [
            'title' => "Bưu kiện 2",
            'content' => "Đây là bưu kiện",
            'publish_date' => "2023/06/07 17:01:27",
            'author' => 4,
            'image' => '2.png',
            'views' => 10,
            'status' => 0
        ]
        ]);
    }
}
