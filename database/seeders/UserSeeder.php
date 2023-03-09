<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array();
            $data[]=[
                'fullname' => 'Dang Thanh Tam',
                'email' => 'thanhtamdang103@gmail.com',
                'phone' => '1113',
                'password' => bcrypt('1231231'),
                'avatar' => 'tam.jpg',
                'level' => 1,
            ];
        DB::table('users')->insert($data);
    }
}
