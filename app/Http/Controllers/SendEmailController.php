<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
 
use App\Mail\NotifyMail;

class SendEmailController extends Controller
{
    public function index()
    {
 
      $data = [
        'subject' => 'Tieu de',
        'email' => 'tuan@gmail.com',
        'content' => 'Noi dung'
      ];

      Mail::to('thanhtamdang103@gmail.com')->send(new NotifyMail($data));
 
     //  if (Mail::failures()) {
     //       return response()->Fail('Sorry! Please try again latter');
     //  }else{
     //       return response()->success('Great! Successfully send in your mail');
     //     }
    } 
}
