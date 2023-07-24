<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Viết câu lệnh tạo dữ liệu mới
        // Cú pháp : DB::table('tên bảng')->insert([]);
        // cú pháp : 'tên trường' => 'giá trị'
        DB::table('customer')->insert([
            'name' => 'quang',
            'email' => 'minh@gmail.com',
            'image'=>'a.jpg',
            'sdt' => '012944',
            'date_of_birth' => '2003/11/09',
            'address' => "Ninh Bình",
            'gender' => 0,
        ]);
    }
}
