<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terminal;
use App\Models\Bus;
use App\Models\Routes;
use App\Models\Booking;
use App\Models\Admin;
use App\Models\Feedback;
use Illuminate\Support\Facades\Hash;
class AdminDashboard extends Controller
{
    public function AddTerminal(Request $req){
      $term = new Terminal;
      $term->term_name = $req->name;
      $term->term_location = $req->location;
      $term->term_status = 1;
      $term->save();

      return response()->json(['status'=>'success']);
    }

    public function UpdateTerminal(Request $req){
        $term = Terminal::where('term_id', $req->term_id)->first();

        if($req->action === 'update'){
            $term->update([
                'term_name'=> $req->name,
                'term_location'=>$req->location,
              ]);
        }else{
            $term->update([
                'term_status'=> 0,
              ]);
        }
        return response()->json(['status'=>'success']);
    }

    public function LoadTerminal(){
        $term = Terminal::where('term_status', 1)->get();

        return response()->json(['terminal'=>$term]);
    }

    public function AddBus(Request $req){
     $bus = new Bus;
     $bus->bus_code = $req->code;
     $bus->bus_type = $req->type;
     $bus->bus_seats = $req->seats;
     $bus->bus_status = 1;
     $bus->save();

     return response()->json(['status'=>'success']);
    }

   public function EditBus(Request $req){

    $bus = Bus::where("bus_id", $req->id)->first();

    if($req->action === 'update'){
        $bus->update([
            'bus_code'=>$req->code,
            'bus_type'=>$req->type,
            'bus_seats'=>$req->seats,
        ]);
    }else{
        $bus->update([
         'bus_status'=> 0,
        ]);
    }

    return response()->json(['status'=>'success']);
   }

   public function LoadBus(){
     $bus = Bus::where('bus_status', 1)->get();

     return response()->json(['bus'=>$bus]);
   }

   public function AddRoute(Request $req){

    $route = new Routes;
    $route->route_code = CodeGenerator(10);
    $route->term_id_from = $req->origin;
    $route->term_id_to = $req->destination;
    $route->bus_id = $req->busCode;
    $route->route_departure_time = $req->dept_time;
    $route->route_departure_date = $req->dept_date;
    $route->route_status = 1;
    $route->save();

    return response()->json(['status'=>'success']);
   }
   
   public function EditRoute(Request $req){
     $route = Routes::where('route_id', $req->id)->first();

     if($req->action=== 'update'){
        $route->update([
            'term_id_from'=>$req->origin,
            'term_id_to'=>$req->destination,
            'bus_id'=>$req->busCode,
            'route_departure_time'=>$req->dept_time,
            'route_departure_date'=>$req->dept_date
        ]);
     }else{
        $route->update([
            'route_status'=> 0,
        ]);
     }

     return response()->json(['status'=>'success']);
   }

   public function LoadRoute(){

    $route = Routes::where('route_status', 1)->get();

    foreach($route as $r){
        $bus = Bus::where('bus_id', $r->bus_id)->first();
        $r->bus_code = $bus->bus_code;
        $terminalFrom = Terminal::where('term_id', $r->term_id_from)->first();
        $terminalTo = Terminal::where('term_id', $r->term_id_to)->first();

        $r->route = $terminalFrom->term_location . "-". $terminalTo->term_location;
        
    }
    
    return response()->json(['route'=>$route]);
   }

   public function GetBookedList(){
    $booking = Booking::where('booking_status', 1)->get();
    foreach($booking as $book){
        $fullname = $book->booking_firstname . " ". $book->booking_surname;
        $book->fullname = $fullname;
    }
    return response()->json(['book'=>$booking]);
   }

   public function GetFeedback(){
    $feedback = Feedback::all();
    foreach($feedback as $fb){
        $fullname = $fb->fb_fname . " ". $fb->fb_surname;
        $fb->fullname = $fullname;
    }
    return response()->json(['feedback'=>$feedback]);
   }

   public function UpdateGeneral(Request $req){
     $user = Admin::where('admin_id', $req->user_id)->first();

     $user->update([
        'admin_name'=>$req->fullname,
        'admin_username'=>$req->username,
     ]);

     return response()->json(['status'=>'success']);
   }
   public function UpdatePass(Request $req){
    $user = Admin::where('admin_id', $req->user_id)->first();
    
    if(Hash::check($req->currentPass, $user->admin_password)){
       if($req->newPass === $req->confirmPass){
        $user->update([
            'admin_password'=>Hash::make($req->newPass),
        ]);
        $status = 'success';
       }else{
        $status = 'not match';
       }
    }else{
        $status = 'failed';
    }

    return response()->json(['status'=>$status]);
   }
   public function UpdatePic(Request $req){
    $user = Admin::where('admin_id', $req->user_id)->first();
    $image = $req->file('profilePic');

    if(!in_array($image->getClientOriginalExtension(), ['jpg', 'jpeg', 'png'])){
        return response()->json(['status'=>'not valid']);
    }
    $filename = 'Admin'. $user->admin_id.".".$image->getClientOriginalExtension();
    $image->move(public_path('admin'), $filename);

    $user->update([
        'admin_pic'=>$filename,
    ]);

    return response()->json(['status'=>'success']);
   }
}
