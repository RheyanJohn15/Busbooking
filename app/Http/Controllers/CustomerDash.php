<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terminal;
use App\Models\Routes;
use App\Models\Booking;
use App\Models\Bus;
use App\Models\Feedback;

class CustomerDash extends Controller
{

    //View
    public function Routes(){
        $routes = Routes::where('route_status', 1)->get();
        $chunkedRoutesArray = $routes->chunk(3);
         return view('landing.routes', compact('chunkedRoutesArray')); 
    }
    //Backend
    public function GetRoute(Request $req){
        $route = Routes::where('route_id', $req->route_id)->first();
        $bus = Bus::where('bus_id', $route->bus_id)->first();
        $seats = $bus->bus_seats;
        $booking = Booking::where('route_id', $req->route_id)->get();
        if($booking){
            foreach($booking as $book){
                $seats -= $book->booking_seats;
            }
        }
        $from = Terminal::where('term_id', $route->term_id_from)->first();
        $to = Terminal::where('term_id', $route->term_id_to)->first();
        $route->bus_code = $bus->bus_code;
        $route->origin = $from->term_location;
        $route->destination = $to->term_location;
        return response()->json(['route'=>$route, 'seats'=>$seats]);
    }


    public function Reserve(Request $req){
    
         $book = new Booking;
         $book->route_id = $req->route_id;
         $book->booking_firstname = $req->fname;
         $book->booking_surname = $req->surname;
         $book->booking_email = $req->email;
         $book->booking_contact = $req->contact;
         $book->booking_seats = $req->tickets;
         $book->booking_code = CodeGenerator(20);
         $book->booking_status = 1;
         $book->save();

         return response()->json(['status'=>'success']);

    }

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

    public function SearchBooking(Request $req){
        $booking = Booking::where('booking_firstname', $req->firstname)->where('booking_surname', $req->lastname)->where('booking_contact', $req->contact)->get();
        if($booking){
            foreach($booking as $book){
            $route = Routes::where('route_id', $book->route_id)->first();
            $origin = Terminal::where('term_id', $route->term_id_from)->first()->term_location;
            $bus = Bus::where('bus_id', $route->bus_id)->first()->bus_code;
            $destination = Terminal::where('term_id', $route->term_id_to)->first()->term_location;

            $book->route = $route;
            $book->origin= $origin;
            $book->bus= $bus;
            $book->destination = $destination;
            }

            return response()->json(['status'=>'success', 'book'=>$booking]);
        }else{
            return response()->json(['status'=>'failed', 'book'=>'']);
        }
    }

    public function SendFeedback(Request $req){
        $fb = new Feedback;
        $fb->fb_fname = $req->name;
        $fb->fb_surname = $req->surname;
        $fb->fb_email = $req->email;
        $fb->fb_message = $req->message;
        $fb->save();

        return response()->json(['status'=>'success']);
    }
}
