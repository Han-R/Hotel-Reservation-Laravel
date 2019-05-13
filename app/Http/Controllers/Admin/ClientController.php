<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\ClientRequest;
use Session;
class ClientController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $items = Client::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.clients.index", compact("items"));
    }
    public function trash(Request $request)
    {
        $q = $request->q;
        $items = Client::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.clients.trash", compact("items"));
    }

    public function create()
    {
        return view("client.clients.create");
    }

    public function store(ClientRequest $request)
    {
        $request['password'] = bcrypt($request->password);
        Client::create($request->all());
        Session::flash("msg","s: Add Operation Done Successfully");
        return redirect(route("clients.create"));
    }
    public function edit($id)
    {
        $item = Client::find($id);
        if(!$item){
            Session::flash("msg", "e: Please Confirm the link You Request");
            return redirect(route("client.index"));
        }
        return view("client.clients.edit", compact("item", "id"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:clients,email,".request()->segment(3)
        ]);
        Client::find($id)->update($request->all());
        Session::flash("msg","s: Update Operation Done Successfully");
        return redirect(route("client.index"));
    }
    
    public function destroy($id)
    {
        Client::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: Delete Operation Done Successfully");
        return redirect(route("client.index"));
    }
    public function restore($id)
    {
        Client::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: Restore Operation Done Successfully");
        return redirect(route("client.trash"));
    }


    
   
}
