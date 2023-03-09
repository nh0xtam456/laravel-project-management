<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StaffInformation extends Seeder
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
                'CV' => Str::random(10),
                'MNV' => $i++,
                'Salary' => 1,
                'Level' => 1,
                'Note' => Str::random(10)
            ];
        }
        DB::table('staffinformations')->insert($data);
    }
}
