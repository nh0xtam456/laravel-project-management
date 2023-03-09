<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StaffSeeder extends Seeder
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
                'Fullname' => 'Trần Văn'.$i,
                'Phone' => '077215253'.$i,
                'Branch_id' => $i,
                'Seniority' => $i,
                'Status' => 1
            ];
        }
        DB::table('staffs')->insert($data);
    }
}
