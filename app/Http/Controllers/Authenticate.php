<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
class Authenticate extends Controller
{
    public function Dashboard(){
        if(Session::has('admin_id')){
            return view('admin.index');
        }else{
            return view('401');
        }
    }
    public function Terminal(){
        if(Session::has('admin_id')){
            return view('admin.terminal');
        }else{
            return view('401');
        }
    }

    public function Bus(){
        if(Session::has('admin_id')){
            return view('admin.buslist');
        }else{
            return view('401');
        }
    }

    public function Route(){
        if(Session::has('admin_id')){
            return view('admin.route');
        }else{
            return view('401');
        }
    }
    
    public function Booked(){
        if(Session::has('admin_id')){
            return view('admin.booked');
        }else{
            return view('401');
        }
    }

    public function Feedback(){
        if(Session::has('admin_id')){
            return view('admin.feedback');
        }else{
            return view('401');
        }
    }


    public function UserAccount(){
        if(Session::has('admin_id')){
            $user = Admin::where('admin_id', session('admin_id'))->first();
            return view('admin.user', ['user'=>$user]);
        }else{
            return view('401');
        }
    }
}
