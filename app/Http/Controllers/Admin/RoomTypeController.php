<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Http\Requests\RoomTypeRequest;
use Session;
class RoomTypeController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $items = RoomType::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(room_type like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.room_types.index", compact("items"));
    }
    public function trash(Request $request)
    {
        $q = $request->q;
        $items = RoomType::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(room_type like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.room_types.trash", compact("items"));
    }

    public function create()
    {
        return view("admin.room_types.create");
    }

    public function store(RoomTypeRequest $request)
    {
        RoomType::create($request->all());

        Session::flash("msg","s: Add Operation Done Successfully");
        return redirect(route("room-type.create"));
    }

    public function edit($id)
    {
        $item = RoomType::find($id);
        if(!$item){
            Session::flash("msg", "e: Please Confirm the link You Request");
            return redirect(route("room-type.index"));
        }
        return view("admin.room_types.edit", compact("item", "id"));
    }
    
    public function update(RoomTypeRequest $request, $id)
    {
        RoomType::find($id)->update($request->all());
        Session::flash("msg","s: Update Operation Done Successfully");
        return redirect(route("room-type.index"));
    }

    public function destroy($id)
    {
        RoomType::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: Delete Operation Done Successfully");
        return redirect(route("room-type.index"));
    }
    public function restore($id)
    {
        RoomType::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: Restore Operation Done Successfully");
        return redirect(route("room-type.trash"));
    }
}