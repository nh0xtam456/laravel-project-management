<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function upload(Request $request)
    {
        $imageName = time().'-'.$request->upload->getClientOriginalName();
        $request->upload->move(public_path('ckeditor'),$imageName);

        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset('ckeditor/'.$imageName);
        $msg = 'Image Successfully uploaded';
        $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

        @header('Content-type: text/html; charset=utf-8');
        echo $re;
    }
}
