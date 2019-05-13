<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RestaurantTable;
use App\Http\Requests\RestaurantTableRequest;
use Session;
class RestaurantTableController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $items = RestaurantTable::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(capacity like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.restaurant_tables.index", compact("items"));
    }
    public function trash(Request $request)
    {
        $q = $request->q;
        $items = RestaurantTable::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(capacity like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.restaurant_tables.trash", compact("items"));
    }

    public function create()
    {
        return view("admin.restaurant_tables.create");
    }

    public function store(RestaurantTableRequest $request)
    {
        RestaurantTable::create($request->all());

        Session::flash("msg","s: Add Operation Done Successfully");
        return redirect(route("restaurant-table.create"));
    }

    public function edit($id)
    {
        $item = RestaurantTable::find($id);
        if(!$item){
            Session::flash("msg", "e: Please Confirm the link You Request");
            return redirect(route("restaurant-table.index"));
        }
        return view("admin.restaurant_tables.edit", compact("item", "id"));
    }
    
    public function update(RestaurantTableRequest $request, $id)
    {
        RestaurantTable::find($id)->update($request->all());
        Session::flash("msg","s: Update Operation Done Successfully");
        return redirect(route("restaurant-table.index"));
    }

    public function destroy($id)
    {
        RestaurantTable::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: Delete Operation Done Successfully");
        return redirect(route("restaurant-table.index"));
    }
    public function restore($id)
    {
        RestaurantTable::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: Restore Operation Done Successfully");
        return redirect(route("restaurant-table.trash"));
    }
}