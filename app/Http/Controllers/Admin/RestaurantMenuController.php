<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RestaurantMenu;
use App\Http\Requests\RestaurantMenuRequest;
use Session;
class RestaurantMenuController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $items = RestaurantMenu::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(product like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.restaurant_menues.index", compact("items"));
    }
    public function trash(Request $request)
    {
        $q = $request->q;
        $items = RestaurantMenu::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(product like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.restaurant_menues.trash", compact("items"));
    }

    public function create()
    {
        return view("admin.restaurant_menues.create");
    }

    public function store(RestaurantMenuRequest $request)
    {
        RestaurantMenu::create($request->all());

        Session::flash("msg","s: Add Operation Done Successfully");
        return redirect(route("restaurant-menu.create"));
    }

    public function edit($id)
    {
        $item = RestaurantMenu::find($id);
        if(!$item){
            Session::flash("msg", "e: Please Confirm the link You Request");
            return redirect(route("restaurant-menu.index"));
        }
        return view("admin.restaurant_menues.edit", compact("item", "id"));
    }
    
    public function update(RestaurantMenuRequest $request, $id)
    {
        RestaurantMenu::find($id)->update($request->all());
        Session::flash("msg","s: Update Operation Done Successfully");
        return redirect(route("restaurant-menu.index"));
    }

    public function destroy($id)
    {
        RestaurantMenu::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: Delete Operation Done Successfully");
        return redirect(route("restaurant-menu.index"));
    }
    public function restore($id)
    {
        RestaurantMenu::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: Restore Operation Done Successfully");
        return redirect(route("restaurant-menu.trash"));
    }
}