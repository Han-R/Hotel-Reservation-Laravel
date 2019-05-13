<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;
use App\Http\Requests\RoomRequest;
use App\Http\Requests\RoomTypeRequest;
use Session;
class RoomController extends BaseController
{
    public function index(Request $request)
    {
        $room_type_id = $request->room_type_id;
        $items = Room::whereRaw("deleted = 0");

        if($room_type_id){
            $items->where("room_type_id", $room_type_id);
        }       
        $items =  $items->paginate(5)->appends([
            "room_type_id" => $room_type_id
        ]);
        $room_types = RoomType::get();
        return view("admin.rooms.index", compact("items","room_types"));
    }
    public function trash(Request $request)
    {
        $room_type_id = $request->room_type_id;
        $items = Room::whereRaw("deleted = 1");

        if($room_type_id){
            $items->where("room_type_id", $room_type_id);
        }         
        $items =  $items->paginate(5)->appends([
            "room_type_id" => $room_type_id
        ]);
        $room_types = RoomType::get();
        return view("admin.rooms.trash", compact("items","room_types"));
    }

    public function create()
    {
        $room_types = RoomType::get();
        return view("admin.rooms.create",compact("room_types"));
    }

    public function store(RoomRequest $request)
    {
        Room::create($request->all());

        Session::flash("msg","s: Add Operation Done Successfully");
        return redirect(route("room.create"));
    }

    public function edit($id)
    {
        $item = Room::find($id);
        if(!$item){
            Session::flash("msg", "e: Please Confirm the link You Request");
            return redirect(route("room.index"));
        }
        $room_types = RoomType::get();
        return view("admin.rooms.edit", compact("item", "id","room_types"));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            "description"  => "required",
            "room_type_id"=> "required"
        ]);

        Room::find($id)->update($request->all());
        Session::flash("msg","s: Update Operation Done Successfully");
        return redirect(route("room.index"));
    }

    public function destroy($id)
    {
        Room::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: Delete Operation Done Successfully");
        return redirect(route("room.index"));
    }
    public function restore($id)
    {
        Room::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: Restore Operation Done Successfully");
        return redirect(route("room.trash"));
    }
}