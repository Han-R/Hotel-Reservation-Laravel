<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PhotoCategory;
use App\Http\Requests\PhotoCategoryRequest;
use Session;
class PhotoCategoryController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $items = PhotoCategory::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.photocategory.index", compact("items"));
    }
    public function trash(Request $request)
    {
        $q = $request->q;
        $items = PhotoCategory::whereRaw("deleted = 1");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.photocategory.trash", compact("items"));
    }

    public function create()
    {
        return view("admin.photocategory.create");
    }

    public function store(PhotoCategoryRequest $request)
    {
        PhotoCategory::create($request->all());

        Session::flash("msg","s: Add Operation Done Successfully");
        return redirect(route("photo-category.create"));
    }

    public function edit($id)
    {
        $item = PhotoCategory::find($id);
        if(!$item){
            Session::flash("msg", "e: Please Confirm the link You Request");
            return redirect(route("photo-category.index"));
        }
        return view("admin.photocategory.edit", compact("item", "id"));
    }
    
    public function update(PhotoCategoryRequest $request, $id)
    {
        PhotoCategory::find($id)->update($request->all());
        Session::flash("msg","s: Update Operation Done Successfully");
        return redirect(route("photo-category.index"));
    }

    public function destroy($id)
    {
        PhotoCategory::find($id)->update(['deleted' => 1]);
        Session::flash("msg","w: Delete Operation Done Successfully");
        return redirect(route("photo-category.index"));
    }
    public function restore($id)
    {
        PhotoCategory::find($id)->update(['deleted' => 0]);
        Session::flash("msg","s: Restore Operation Done Successfully");
        return redirect(route("photo-category.trash"));
    }
}