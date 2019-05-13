<?php

namespace App\Http\Controllers\Admin;
use App\Models\Video;
use App\Models\VideoCategory;
use App\Http\Requests\VideoRequest;
use Session;

use Illuminate\Http\Request;

class VideoController  extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $video_categories_id = $request->video_categories_id;
        $items = Video::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        if($video_categories_id){
            $items->where("video_categories_id", $video_categories_id);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q,
            "video_categories_id" => $video_categories_id
        ]);
        $videoCategory = VideoCategory::get();
       
        return view("admin.Videos.index", compact("items", "videoCategory"));
    }
    public function published($id)
    {  
        $video = Video::find($id);
        $video->published = !$video->published;
        $video->save();
       

        Session::flash("msg","s: Publish Operation Done Successfully");
        return redirect(route("video.index"));
    }
    

    public function trash(Request $request)
    {
        $q = $request->q;
        $items = Video::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.Videos.trash", compact("items"));
    }
   
    public function restore($id)
    {
        Video::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: Restore Operation Done Successfully");
        return redirect(route("video.trash"));
    }
    
    public function create()
    {
        $videoCategory = VideoCategory::get();
       
        return view("admin.Videos.create", compact("videoCategory"));
    }

    
    public function store(VideoRequest $request)
    {
        Video::create($request->all());

        Session::flash("msg","s: Add Operation Done Successfully");
        return redirect(route("video.create"));
    }

   
    public function show($id)
    {
        return view("admin.Videos.show",compact("id"));
    }

    
    public function edit($id)
    {   $videoCategory =VideoCategory::all();
        $item = Video::find($id);
        if(!$item){
            Session::flash("msg", "e: Please Confirm the link You Request");
            return redirect(route("Videos.index"));
        }
        return view("admin.Videos.edit", compact("item", "id","videoCategory"));
    }

  
    public function update(VideoRequest $request, $id)
    {
        Video::find($id)->update($request->all());
        Session::flash("msg","s: Update Operation Done Successfully");
        return redirect(route("video.index"));
    }

    
    public function destroy($id)
    {
        Video::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: Delete Operation Done Successfully");
        return redirect(route("video.index"));
    }
}
