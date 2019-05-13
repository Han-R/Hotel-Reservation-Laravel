<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Models\Link;
use App\Http\Requests\UserRequest;
use Session;
class UserController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $items = User::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.users.index", compact("items"));
    }
    public function trash(Request $request)
    {
        $q = $request->q;
        $items = User::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.users.trash", compact("items"));
    }

    public function create()
    {
        return view("admin.users.create");
    }

    public function store(UserRequest $request)
    {
        $request['password'] = bcrypt($request->password);
        User::create($request->all());
        Session::flash("msg","s: Add Operation Done Successfully");
        return redirect(route("users.create"));
    }
    public function edit($id)
    {
        $item = User::find($id);
        if(!$item){
            Session::flash("msg", "e: Please Confirm the link You Request");
            return redirect(route("users.index"));
        }
        return view("admin.users.edit", compact("item", "id"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email,".request()->segment(3)
        ]);
        User::find($id)->update($request->all());
        Session::flash("msg","s: Update Operation Done Successfully");
        return redirect(route("users.index"));
    }
    public function destroy($id)
    {
        User::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: Delete Operation Done Successfully");
        return redirect(route("users.index"));
    }
    public function restore($id)
    {
        User::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: Restore Operation Done Successfully");
        return redirect(route("users.trash"));
    }


    
    public function links($id)
    {
        $item = User::find($id);
        if(!$item){
            Session::flash("msg", "e: Please Confirm the link You Request");
            return redirect(route("users.index"));
        }
        $links = Link::all();
        return view("admin.users.links", compact("item", "links", "id"));
    }

    public function saveLinks(Request $request, $id)
    {
        \DB::table("users_links")->where("users_id", $id)->delete();
        foreach($request->links as $link){
            \DB::table("users_links")->insert([
                'users_id'=>$id,
                'links_id'=>$link
            ]);
        }
        Session::flash("msg","s: Update Operation Done Successfully");
        return redirect(route("users.index"));
    }
}
