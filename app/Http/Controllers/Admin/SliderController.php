<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\SliderRequest;
use Session;
class SliderController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $items = Slider::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(title like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.slider.index", compact("items"));
    }
    public function trash(Request $request)
    {
        $q = $request->q;
        $items = Slider::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(title like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.slider.trash", compact("items"));
    }

    public function create()
    {
        return view("admin.slider.create");
    }

    public function store(SliderRequest $request)
    {
        Slider::create($request->all());
        Session::flash("msg","s: Add Operation Done Successfully");
        return redirect(route("slider.create"));
    }

    public function edit($id)
    {
        $item = Slider::find($id);
        if(!$item){
            Session::flash("msg", "e: Please Confirm the link You Request");
            return redirect(route("slider.index"));
        }
        return view("admin.slider.edit", compact("item", "id"));
    }
    
    public function update(SliderRequest $request, $id)
    {
        Slider::find($id)->update($request->all());
        Session::flash("msg","s: Update Operation Done Successfully");
        return redirect(route("slider.index"));
    }

    public function destroy($id)
    {
        Slider::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: Delete Operation Done Successfully");
        return redirect(route("slider.index"));
    }
    public function restore($id)
    {
        Slider::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: Restore Operation Done Successfully");
        return redirect(route("slider.trash"));
    }
}