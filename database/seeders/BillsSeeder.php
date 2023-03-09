<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BillsSeeder extends Seeder
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
                'Category_id' => Str::random(10),
                'Address' => 1,
                'Date_doit' => new \Datetime(),
                'Price' => 1,
                'SHD' => Str::random(10),
                'created_at' => new \Datetime(),
            ];
        }
        DB::table('bills')->insert($data);
    }
}
