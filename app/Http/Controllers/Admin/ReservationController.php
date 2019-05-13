<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RoomReservation;
use App\Models\RoomType;
use App\User;
use App\Http\Requests\EventRequest;
use Session;
use DB;

class ReservationController extends BaseController
{
    public function index(Request $request)
    {
        $client_id = $request->client_id;
        $room_id = $request->room_id;
        $items = RoomReservation::whereRaw("deleted = 0");
        if($client_id){
            $items->where("client_id", $client_id);
        }
        if($room_id){
            $items->where("room_id", $room_id);
        }            
        $items =  $items->paginate(5)->appends([
            "client_id" => $client_id,
            "room_id" => $room_id
        ]);
        $rooms=RoomType::get();
        $clients=User::get();
        return view("admin.reservations.index", compact("items","rooms","clients"));
    }
    public function trash(Request $request)
    {
        $client_id = $request->client_id;
        $room_id = $request->room_id;
        $items = RoomReservation::whereRaw("deleted = 1");
        if($client_id){
            $items->where("client_id", $client_id);
        }
        if($room_id){
            $items->where("room_id", $room_id);
        }            
        $items =  $items->paginate(5)->appends([
            "client_id" => $client_id,
            "room_id" => $room_id
        ]);
        $rooms=RoomType::get();
        $clients=RoomReservation::get();
        return view("admin.reservations.trash", compact("items","rooms","clients"));
    }

    public function destroy($id)
    {
        RoomReservation::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: Delete Operation Done Successfully");
        return redirect(route("reservation.index"));
    }
    public function restore($id)
    {
        RoomReservation::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: Restore Operation Done Successfully");
        return redirect(route("reservation.trash"));
    }
}