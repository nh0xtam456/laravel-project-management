<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array();
        for($i=1;$i<=10;$i++)
        {
            $data[]=[
                'Product_name' => Str::random(10),
                'Intro' => $i++,
                'Content' => 1,
                'Price' => 1,
            ];
        }
        DB::table('products')->insert($data);
    }
}
