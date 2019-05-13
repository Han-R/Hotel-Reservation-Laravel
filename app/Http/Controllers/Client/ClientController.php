<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StaticPage;
use App\Models\Slider;
use App\Models\Video;
use App\Models\PhotoCategory;
use App\Models\VideoCategory;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\Event;
use App\Models\Message;
use App\Models\Photo;
use App\Models\RestaurantMenu;
use App\Models\RestaurantTime;
use App\Models\RoomReservation;
use Session;
use DB;
class ClientController extends Controller
{
    
    public function index()
    {
        $sliders = Slider::where("deleted",0)->where("active",1)->inRandomOrder()->take(5)->get();
        $rooms = RoomType::where("deleted",0)->get();
        $about = StaticPage::where("deleted",0)->where("title","ABOUT US")->first();
        $eventphotos = Photo::where("deleted",0)->where("photo_categories_id",1)->get();
        $menuphotos = Photo::where("deleted",0)->where("photo_categories_id",2)->get();
        $roomphotos = Photo::where("deleted",0)->where("photo_categories_id",3)->get();
        $staticpagephotos = Photo::where("deleted",0)->where("photo_categories_id",5)->get();
        $ourbest = Photo::where("deleted",0)->where("photo_categories_id",6)->first();
        return view('home',compact('sliders','rooms','about','eventphotos','menuphotos','roomphotos','staticpagephotos','ourbest'));
    }

    // public function page($id)
    // {
    //     $item = StaticPage::find($id);
    //     if(!$item || $item->deleted || !$item->active){
    //         return redirect(route("home"));
    //     }
    //     return view('client.staticpages.page')->withItem($item);
    // }

    public function room()
    {
        $rooms = RoomType::where("deleted",0)->get();
        return view('client.rooms.room',compact('rooms'));
    }

    public function roomDetail(Request $request,$id)
    {
        $room = RoomType::find($id);
        $allrooms=RoomType::where("room_type",$room->room_type)->get();
        return view('client.rooms.room-detail',compact('allrooms','room'));
    }

    public function restaurant()
    {
        $products = RestaurantMenu::where("deleted",0)->get();
        $times=RestaurantTime::where("deleted",0)->get();
        return view('client.restaurants.restaurant',compact('products','times'));
    }

    public function login()
    {
        return view('client.clients.login');
    }

    public function register()
    {
        return view('client.clients.register');
    }


    public function message(Request $request)
    {
        Message::create($request->all());
        Session::flash("msg","s: Your Message Arrived Us Successfully, Please check your eamil");
        return redirect(route("home.contact"));
    }

    public function contact()
    { 
        $item = StaticPage::where("deleted",0)->where("title","CONTACT US")->where("active",1)->first();
        if(!$item || $item->deleted || !$item->active){
            return redirect(route("home"));
        }
        return view('client.staticpages.contact',compact('item'));
    }
    public function about()
    {
        $item = StaticPage::where("deleted",0)->where("title","ABOUT US")->where("active",1)->first();
        if(!$item || $item->deleted || !$item->active){
            return redirect(route("home"));
        }
        return view('client.staticpages.about',compact('item'));
    }
    public function gallery()
    {
        $eventphotos = Photo::where("deleted",0)->where("photo_categories_id",1)->get();
        $menuphotos = Photo::where("deleted",0)->where("photo_categories_id",2)->get();
        $roomphotos = Photo::where("deleted",0)->where("photo_categories_id",3)->get();
        $staticpagephotos = Photo::where("deleted",0)->where("photo_categories_id",5)->get();

        return view('client.staticpages.gallery',compact('eventphotos','menuphotos','roomphotos','staticpagephotos'));
    }

    public function event()
    {
        $events= Event::where("deleted",0)->get();
        return view('client.staticpages.event',compact('events'));
    }

}
