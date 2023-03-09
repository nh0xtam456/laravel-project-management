<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = DB::table('customers')  
                                        ->select( DB::raw('COUNT(customers.id) as countid'),
                                                DB::raw('COUNT(Status) as countstatus'),
                                                DB::raw('COUNT(staff_id) as staffid'),)
                                        ->first();
        $data2 = DB::table('customers') -> select( DB::raw('COUNT(Status) as countstatus'))
                                            ->where ('Status','=','3')
                                            ->first();
        $data1= DB::table('staffs')     ->select(DB::raw('COUNT(id) as countid'))
                                        ->where('Seniority','>=','2')
                                        ->first();
        $data3= DB::table('branchs')     ->select(DB::raw('COUNT(id) as countid'))
                                        ->first();             
                                        
        $datahead1= DB::table('news')-> where('position','=','1')->first();
        $datahead2= DB::table('news')-> where('position','=','2')->first();
        $datahead3= DB::table('news')-> where('position','=','3')->first();
        return view('website.master',['data' => $data
                                    ,'data2' => $data2
                                    , 'data1' => $data1
                                    ,'data3' => $data3
                                    ,'datahead1' => $datahead1
                                    ,'datahead2' => $datahead2
                                    ,'datahead3' => $datahead3
                                ]);
    }
}
