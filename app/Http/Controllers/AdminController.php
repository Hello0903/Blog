<?php

namespace App\Http\Controllers;

use App\Models\PostsModel;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function home(){
        $data = PostsModel::orderBy('id','desc')->paginate(10);
        return view('admin.home',['post'=>$data]);
    }
    public function write(){
        return view('admin.write_post');
    }
    public function add_write(Request $request){
       $id = PostsModel::orderBy('id','desc')->first();
       $id_post = $id->id;
    //    dd(++$id_post);
       $file_name = '';
        if($request->has('images')){
            $listimage = $request->images;
            // dd($listimage);
                # code...
                $ext = $listimage->extension();
                $file_name = time().rand(0,100).'-image.'.$ext;
                // dd($value);
                $listimage->move(public_path('asset/images'),$file_name);
                // sleep(1);
        }
        DB::table('posts')->insert([
            'id' => ++$id_post,
            'title' => $request->title,
            'image' => $file_name,
            'content' => $request->text,
            'category_id' => 2,
            'user_id' => 'admin123',
            'shot_content' => $request->short_title,
        ]);

    }
    public function login(){
        return view('admin.login');
    }
    public function login_user(Request $request){
        $user = $request->user;
        $pass = $request->pass;

        $login = DB::table('user')->where('username','=',$user)->where('password','=',$pass)->first();
        if($login){
            if(session_status()===PHP_SESSION_NONE)
            session_start();
            $_SESSION['admin']='admindepzai';
            return redirect()->route('admin');
        }
    }
    public function check_post($id,$type){
        if($this->check_admin()){
            if($type=='0')
            return DB::table('posts')->where('id','=',$id)->update(['status' => '0']);
            else
            return DB::table('posts')->where('id','=',$id)->update(['status' => '1']);
        }
        
    }
    public function check_admin(){
        if(session_status()===PHP_SESSION_NONE)
            session_start();
            if(!isset($_SESSION['admin'])){
            return false;
            } else if($_SESSION['admin'] != 'admindepzai'){
            return false;
             }
        return true;
    }
}
