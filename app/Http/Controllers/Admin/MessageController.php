<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests\MessageRequest;
use Session;
use Mail;
class MessageController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $items = Message::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(subject like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.messages.index", compact("items"));
    }
    public function trash(Request $request)
    {
        $q = $request->q;
        $items = Message::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(subject like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.messages.trash", compact("items"));
    }

    public function create()
    {
        return view("client.messages.create");
    }

    public function store(MessageRequest $request)
    {
        Message::create($request->all());

        Session::flash("msg","s: Add Operation Done Successfully");
        return redirect(route("message.create"));
    }

   

    public function destroy($id)
    {
        Message::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: Delete Operation Done Successfully");
        return redirect(route("message.index"));
    }
    public function restore($id)
    {
        Message::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: Restore Operation Done Successfully");
        return redirect(route("message.trash"));
    }

    public function reply($id)
    {
        $item = Message::find($id);
        if(!$item){
            Session::flash("msg", "e: Please Confirm the link You Request");
            return redirect(route("message.index"));
        }
        return view("admin.messages.reply", compact("item", "id"));
    }
    
    public function sendReply(Request $request, $id)
    {
          $item = Message::find($id);
          $q = $request->q;
          $name=$item->name;
          $email=$item->email;
    	 Mail::send(['text'=>'mail'],['name'=>'haneen'],function($message) use ($email,$q){
    	 $message->to($email, 'To user')->subject($q);
    	 $message->from('haneenieng.as@gmail.com','Hotel Management');
    		
         });
         Message::find($id)->update(['deleted' => 1]);
         Session::flash("msg","s: Replaying Operation Done Successfully");
         return redirect(route("message.index"));
    }
}