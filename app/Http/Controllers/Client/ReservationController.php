<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\RoomReservation;
use Session;
use DB;
use Auth;
class ReservationController extends BaseController
{
    public function reservation(Request $request,$id)
    {
         $check_in=$request->session()->get('check_in');
         $check_out=$request->session()->get('check_out');
         $capacity=$request->session()->get('capacity');
        // $check_in=date('Y-m-d', strtotime($check_in));
        // $check_out=date('Y-m-d', strtotime($check_out));

  
        
       
        DB::table('room_reservations')->insert([
            'client_id'=>Auth::user()->id,
            'room_id'   => $id,
            'check_in'  => $check_in,
            'check_out' => $check_out,
            ]);
       
        RoomType::where('id', $id)->update(array('reserved' => 1));

        //return redirect(route("home.reservationDetails"));
        //  $rooms =RoomType::whereIn('id',RoomReservation::select('room_id')
        //  ->where(function ($query) {
        //  $query->where('client_id',Auth::user()->id);}))
        //  ->get();
        
        $reservedRooms=RoomReservation::where('client_id',Auth::user()->id)->where('deleted',0)->get();
        return view('client.reservations.reservation',compact('reservedRooms'));
    }

    public function reservationCancellation(Request $request,$id)
    {
        $reservedRooms=RoomReservation::where('client_id',Auth::user()->id)->where('deleted',0)->get();
        
        RoomType::where('id', $id)->update(array('reserved' => 0));
        RoomReservation::where('room_id', $id)->update(array('deleted' => 1));

        //return redirect(route("home.reservation",$id));
       return view('client.reservations.reservation_details',compact('reservedRooms'));
        
    }

    

    public function check(Request $request)
    {
        $request->session()->put('check_in',date('Y-m-d', strtotime($request->check_in)));
        $request->session()->put('check_out', date('Y-m-d', strtotime($request->check_out)));
        $request->session()->put('capacity', $request->capacity);
        $check_in=date('Y-m-d', strtotime($request->check_in));
        $check_out= date('Y-m-d', strtotime($request->check_out));
        $capacity=$request->capacity;
        $rooms =RoomType::whereNotIn('id',RoomReservation::select('room_id')
        ->where(function ($query) {
        $query->where([['check_in','<','$check_in'],['check_out','<','$check_in']])
        ->orWhere([['check_in','>','$check_out'], 
                 ['check_out','>','$check_out']]);})
        ->where('deleted',0)
        ->where('cancel',0))
        ->where('reserved',0)
        ->where('deleted',0)
        ->where('capacity','=',$capacity)         
        ->get();
  
       //dd($rooms);
        
                        
    return view('client.reservations.check_avaliability',compact('rooms'));

 
    }
}
