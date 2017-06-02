<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Redirect, Input, Response, Image, Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('admin/weblive');
    }


    public function  resetPassword(){
        return view('auth.reset');
    }

    public function  changePassword(Request $request){

        $this->validate($request, [
            '_token' => 'required',
            'oldpassword' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);




        $user=Auth::user();
        $name=$user->name;
        $oldpassword=trim($request->oldpassword);
        $password=trim($request->password);
        $password_confirmation=trim($request->password_confirmation);


        $eqflag=Auth::attempt(['name' => $name, 'password' => $oldpassword]);



        if (($password==$password_confirmation) and $eqflag){
            $user->password = bcrypt($password);
            $user->save();
            Auth::logout($user);
            return redirect('logout');
        }else if($password==$password_confirmation){
            return redirect('resetpassword')
                        ->withErrors("老密码出错了！");
        }else{
            return redirect('resetpassword')
                        ->withErrors("新密码不一致！");
        }

    }

     public function uploadImgFile(Request $request)
    {
        //Ajax上传图片
        // $file = Input::file('file');
        // $filetype = Input::get('filetype');
        $file = $request->file('file');
        $filetype=$request->filetype;
        $ext=strtolower($file->getClientOriginalExtension());

        $allowed_extensions = array("jpg", "bmp", "gif", "tif","png","jpeg");
        if ($ext && !in_array($ext, $allowed_extensions)) {
            return Response::json([ 'errors' => '只能上传png、jpg、gif、等等文件.']);
        }
        if ($filetype=='image'){
            $destinationPath = config('weblive.thumb_path');
            $extension = $file->getClientOriginalExtension();
            $fileName = str_random(16).'.'.$extension;
            $file->move($destinationPath, $fileName);
            $img = Image::make(public_path($destinationPath.$fileName))
                        ->resize(320, null, function ($constraint) {
                                            $constraint->aspectRatio();
                                        });
            $img->save(public_path($destinationPath.$fileName));
        }else if($filetype=='adimg'){
            $destinationPath = config('weblive.thumb_path');
            $extension = $file->getClientOriginalExtension();
            $fileName = str_random(16).'.'.$extension;
            $file->move($destinationPath, $fileName);
            $img = Image::make(public_path($destinationPath.$fileName))
                        ->resize(320, null, function ($constraint) {
                                            $constraint->aspectRatio();
                                        });

        }
        return Response::json(
            [
                'success' => true,
                'src' =>$fileName,
                'filetype' => $filetype
            ]
        );
    }



}
