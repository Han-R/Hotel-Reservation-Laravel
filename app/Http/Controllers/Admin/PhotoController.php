<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\PhotoCategory;
use App\Http\Requests\PhotoRequest;
use App\Http\Requests\PhotoCategoryRequest;
use Session;
use Illuminate\Support\Facades\Storage;


class PhotoController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $photo_categories_id = $request->photo_categories_id;
        $items = Photo::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(tag like ?)", ["%$q%"]);
        }        
        if($photo_categories_id){
            $items->where("photo_categories_id", $photo_categories_id);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q,
            "photo_categories_id" => $photo_categories_id
        ]);
        $categories = PhotoCategory::get();
        return view("admin.photo.index", compact("items", "categories"));
    }
    public function browse(Request $request)
    {
        $q = $request->q;
        $photo_categories_id = $request->photo_categories_id;
        $items = Photo::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(tag like ?)", ["%$q%"]);
        }        
        if($photo_categories_id){
            $items->where("photo_categories_id", $photo_categories_id);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q,
            "photo_categories_id" => $photo_categories_id
        ]);
        $categories = PhotoCategory::get();
        return view("admin.photo.browse", compact("items", "categories"));
    }

    public function create()
    {
        $categories = PhotoCategory::get();
      
        return view("admin.photo.create",compact("categories"));
    }

    public function store(PhotoRequest $request)
    {
        if ($request->hasFile('fle_photo')) {
             $request['file'] = basename($request->fle_photo->store('public/images'));
        }
        Photo::create($request->all());
        Session::flash("msg","s: Add Operation Done Successfully");
        return redirect(route("photo.create"));
    }
    public function show($id)
    {
        $items = Photo::find($id);
        if(!$items){
            Session::flash("msg", "e: Invalid ID in URL");
            return redirect(route("admin.photo.index"));
        }
        
        return view("photo.show", compact("items", "id"));
    }
    

    public function edit($id)
    {
        $items = Photo::find($id);
        if(!$items){
            Session::flash("msg", "e: Invalid ID in URL");
            return redirect(route("admin.photo.index"));
        }
        $categories = PhotoCategory::get();
        return view("admin.photo.edit", compact("items", "id", "categories"));
       
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "tag"  => "required",
            "photo_categories_id"=> "required"
        ]);
        if ($request->hasFile('fle_photo')) {
             $request['file'] = basename($request->fle_photo->store('public/images'));
        }
        Photo::find($id)->update($request->all());
        Session::flash("msg","s: Update Operation Done Successfully");
        return redirect(route("photo.index"));
    }

    public function trash(Request $request)
    {
        $q = $request->q;
        $items = Photo::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(tag like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.photo.trash", compact("items"));
    }

    public function destroy($id)
    {
        Photo::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: Delete Operation Done Successfully");
        return redirect(route("photo.index"));
    }
    public function restore($id)
    {
        Photo::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: Restore Operation Done Successfully");
        return redirect(route("photo.trash"));
       
    }
}