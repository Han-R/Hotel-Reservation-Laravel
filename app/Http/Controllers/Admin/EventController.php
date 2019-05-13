<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\EventRequest;
use Session;
use DB;

class EventController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $items = Event::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(event_name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.events.index", compact("items"));
    }
    public function trash(Request $request)
    {
        $q = $request->q;
        $items = Event::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(event_name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.events.trash", compact("items"));
    }

    public function create()
    {
        return view("admin.events.create");
    }

    public function store(EventRequest $request)
    {
        $event_date=date('Y-m-d', strtotime($request->event_date));
        DB::table('events')->insert([
            'event_name'=>$request->event_name ,
            'image'   => $request->image,
            'event_date'  => $event_date,
            ]);
           

        Session::flash("msg","s: Add Operation Done Successfully");
        return redirect(route("event.create"));
    }

    public function edit($id)
    {
        $item = Event::find($id);
        if(!$item){
            Session::flash("msg", "e: Please Confirm the link You Request");
            return redirect(route("event.index"));
        }
        return view("admin.events.edit", compact("item", "id"));
    }
    
    public function update(EventRequest $request, $id)
    {
        Event::find($id)->update($request->all());
        Session::flash("msg","s: Update Operation Done Successfully");
        return redirect(route("event.index"));
    }

    public function destroy($id)
    {
        Event::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: Delete Operation Done Successfully");
        return redirect(route("event.index"));
    }
    public function restore($id)
    {
        Event::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: Restore Operation Done Successfully");
        return redirect(route("event.trash"));
    }
}