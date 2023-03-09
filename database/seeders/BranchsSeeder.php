<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BranchsSeeder extends Seeder
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
                'Name' => 'Quận'.$i,
                'Address' => '19'.$i.'Hàm Tử Q5',
                'Phone' => '012345678'.$i,
                'Status' => 1
            ];
        }
        DB::table('branchs')->insert($data);
    }
}
