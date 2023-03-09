<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SalesSeeder extends Seeder
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
                'Bills' => $i,
                'MNV' => $i,
                'branchs' => 1,
                'created_at' => date("Y-m-d H:i:s",mt_rand(1262055681,1262055681))
            ];
        }
        DB::table('sales')->insert($data);
    }
}
