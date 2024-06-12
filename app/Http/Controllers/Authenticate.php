<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
}
