<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RestaurantTime;
use App\Http\Requests\RestaurantTimeRequest;
use Session;
class RestaurantTimeController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $items = RestaurantTime::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(time like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.restaurant_times.index", compact("items"));
    }
    public function trash(Request $request)
    {
        $q = $request->q;
        $items = RestaurantTime::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(time like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.restaurant_times.trash", compact("items"));
    }

    public function create()
    {
        return view("admin.restaurant_times.create");
    }

    public function store(RestaurantTimeRequest $request)
    {
        RestaurantTime::create($request->all());

        Session::flash("msg","s: Add Operation Done Successfully");
        return redirect(route("restaurant-time.create"));
    }

    public function edit($id)
    {
        $item = RestaurantTime::find($id);
        if(!$item){
            Session::flash("msg", "e: Please Confirm the link You Request");
            return redirect(route("restaurant-time.index"));
        }
        return view("admin.restaurant_times.edit", compact("item", "id"));
    }
    
    public function update(RestaurantTimeRequest $request, $id)
    {
        RestaurantTime::find($id)->update($request->all());
        Session::flash("msg","s: Update Operation Done Successfully");
        return redirect(route("restaurant-timet.index"));
    }

    public function destroy($id)
    {
        RestaurantTime::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: Delete Operation Done Successfully");
        return redirect(route("restaurant-time.index"));
    }
    public function restore($id)
    {
        RestaurantTime::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: Restore Operation Done Successfully");
        return redirect(route("restaurant-time.trash"));
    }
}