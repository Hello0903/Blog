<?php

namespace App\Http\Controllers;

use App\Models\PostsModel;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home(){
        
        $data = PostsModel::where('status','=','0')->orderBy('date_create','desc')->paginate(5);
        return view('client.home',['list_post'=> $data]);
    }

    public function details($id){
        // dd('123');
        $data = PostsModel::where('id','=',$id)->first();
        return view('client.details',['details'=> $data]);

    }
}
