<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomersSeeder extends Seeder
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
                'Fullname' => 'Nguyễn Văn '.$i,
                'Address' => '19'.$i.'Bạch Đằng F15 Quận Bình Thạnh',
                'Phonenumber' => '077275253'.$i,
                'Email' => 'thanhtamdang10'.$i.'@gmail.com',
                'Note' => 'Khách hàng yêu cầu trễ lắm là thi công trong vòng'.$i.'tiếng',
                'Status' => rand(0,3),
                'date_todo' => new \Datetime(),
                'branch_id' => $i,
                'staff_id' => $i,
                'created_at' => date("Y/m/d",strtotime("-$i Month"))
            ];
        }
        DB::table('customers')->insert($data);
    }
}
