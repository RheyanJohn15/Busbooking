<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terminal;
use App\Models\Routes;
use App\Models\Bus;

class CustomerDash extends Controller
{
    public function SearchRoute(Request $req){
        $route = Routes::where('term_id_from', $req->origin)->where('term_id_to', $req->destination)->where('bus_id', $req->bus)->get();

        if($route->isNotEmpty()){
            foreach($route as $r){
                $terminalOrigin = Terminal::where('term_id', $req->origin)->first();
                $terminalDestination = Terminal::where('term_id', $req->destination)->first();
                $bus = Bus::where('bus_id', $req->bus)->first();
    
                $r->origin = $terminalOrigin;
                $r->destination = $terminalDestination;
                $r->bus = $bus;
    
                $status = 'success';
            }
        }else{
            $status = 'fail';
        }
        

        return response()->json(['route'=>$route, 'status'=>$status]);
    }
}
