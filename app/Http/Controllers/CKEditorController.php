<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class CKEditorController extends Controller
{

    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->upload->extension();

        $request->upload->move(public_path(Lesson::PATH . '/images'), $imageName);

        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = asset(Lesson::PATH . '/images/' . $imageName);
        $msg = 'Image uploaded successfully';
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

        @header('Content-type: text/html; charset=utf-8');
        echo $response;
    }
}
