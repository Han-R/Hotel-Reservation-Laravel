@extends("layouts._admin")
@section("title", "Videos Management")

@section("content")



<form class="row">
        <div class="col-sm-3">
            <input type="text" value='{{ request()->q }}' placeholder="Enter search word.." name="q" autofocus class="form-control" />
        </div>
        <div class="col-sm-3">
            <select class="form-control" id="video_categories_id" name="video_categories_id">
                <option value="">Select Video Category</option>
                @foreach($videoCategory as $category)
                    <option {{ request()->video_categories_id ==$category->id?"selected":"" }} 
                    value="{{ $category->id }}">{{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary"><i class='fa fa-search'></i>Search</button>
        </div>
        
        <div class="col-sm-3">
            <a class="btn btn-success float-right mb-3" href="{{ route('video.create') }}"><i class='fa fa-plus'></i>Add New Video</a>
        </div>
    </form>
    @if($items->total()>0)
        <div class="alert alert-info mb-3">found {{ $items->total() }}Results of serach operation</div>
        <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>Video Name</th>
                <th>Video Category</th>
                <th width="15%">Add Date</th>
                <th width="5%">Publish</th>
                <th width="25%"></th>
            </tr>
        </thead>
        <tbody>
       
                @foreach($items as $item)
                <tr>
                    <td><a href='{{ $item->url }}' target='_blank'>{{ $item->title }}</a></td>
                    <td>{{ $item->VideoCategory->name}}</td>
                    <td>{{ $item->created_at }}</td>
                    <td><input type="checkbox" {{ $item->published?"checked":""}} disabled /></td>
                    <td class="text-right">           
                        <a class="btn btn-sm btn-primary" href='{{ route("video.edit", ["id" => $item->id]) }}'><i class='fa fa-edit'></i>Update</a>  
                        <a class="btn btn-sm btn-danger confirm" href='{{ route("video.delete", $item->id) }}'><i class='fa fa-trash'></i>Delete</a>
                        <a style="width:100px" class="btn btn-sm btn-{{ $item->published?"warning":"info" }} confirm" href='{{ route("video.published", ["id" => $item->id]) }}'><i class='fa fa-edit'></i> {{ $item->published?"Cancel Publish":"Publish " }}</a>  
                        
                    </td>
             

            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    
    <div class="alert alert-warning">
             Sorry, there is no results to show:(
        </div>
    @endif
@endsection
 



                             
