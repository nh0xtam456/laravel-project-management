<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest1;
use Illuminate\Support\Facades\DB;
use Mail;
use App\Mail\NotifyMail;


class RegisterController1 extends Controller
{
    public function index(){
        return view('website.modules.register');
    }
    public function store(RegisterRequest1 $request){
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime(); 
        $data['Status']=1;
        $result = DB::table('customers')->insert($data);
        if($result){
            Mail::to('thanhtamdang103@gmail.com')->send(new NotifyMail($data));
        }    
    }

}
