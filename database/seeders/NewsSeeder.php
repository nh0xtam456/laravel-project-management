<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([[
            'title' => 'FPT Telecom Chairwoman Among Vietnam’s 20 Most Influential Businesswomen',
            'intro' => 'Forbes Vietnam has announced the list of the 50 most influential Vietnamese women in 2017, 20 of whom are businesswomen. FPT Telecom Chairwoman Chu Thanh Ha is the only representative of the telecommunication industry in business area.',
            'content' => 'undefined',
            'image' => 'tintuc1.jpg',
            'position' => 1
        ],
        [
            'title' => 'FPT Is The Only Enterprise In The Large-Cap Group Achieving A Dual Win At The 2022 IR Awards',
            'intro' => 'Representative of FPT, Mr. Vo Dang Phat, Chief of Marketing and Communications (CMO), received the award of Top 3 Large-caps with the most favored IR activities by investors in 2022',
            'content' => 'undefined',
            'image' => 'tintuc2.jpg',
            'position' => 2
        ],
        [
            'title' => 'Launching Of The First Microchip Chip By FPT',
            'intro' => 'FPT Semiconductor, a chip design and manufacturing company (under FPT Software, a member company of FPT Corporation), has officially launched the first line of IC chips used in Internet of Things (IoT) products for the medical field, realizing Vietnamese intelligence dream of manufacturing semiconductor components.',
            'content' => 'undefined',
            'image' => 'tintuc3.jpg',
            'position' => 3
        ]]);
    }
}
