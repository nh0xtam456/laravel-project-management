<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function view_register()
    {
        return view('admin.register');
    }

    public function request_register(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name,
            'random' => Str::uuid()
        ];
        $result = DB::table('users')->insert($data);
        if($result){
            Mail::to($request->email)->send(new Verify($data));
        }           
    }

    public function verify ($uuid)
    {
        $data = DB::table('users')->where('random',$uuid)->first();

        if($data->email_verified_at == null)
        {
            DB::table('users')->where('random', $uuid)->update(['email_verified_at' => new \DateTime()]);
            echo 'Xac nhan tai khoan thanh cong va chuyen trang login';
        }
        else
        {
            return redirect()->route('root');
        }
    }
    
}
