<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index(){
        return view('manage.index');
    }

    public function uploader(Request $request){
        if ($request->hasFile('upload')) {     //upload为ckeditor默认的file提交ID
          $file = $request->file('upload');   //从请求数据内容中取出图片的内容
          $allowed_extensions = ["png", "jpg", "gif"]; //允许的图片后缀
          if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
              return '图片后缀只支持png,jpg,gif,请检查！';
          }
          $destinationPath = 'uploads/images/';  //图片存放路径
          $extension = $file->getClientOriginalExtension();  //获得文件后缀
          $fileName = str_random(10) . '.' . $extension;  //创建图片名字
          $result = $file->move($destinationPath, $fileName); //存储图片到路径
          $callback = $request->query('CKEditorFuncNum');
          $imageContextPath = url('').'/'.$result;
          exit ("<script type=\"text/javascript\">window.parent.CKEDITOR.tools.callFunction(" .  $callback . ",'" . $imageContextPath . "','')</script>");
        }
    }
}
