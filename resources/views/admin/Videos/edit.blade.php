@extends("layouts._admin")

@section("title", "Video Update")

@section("content")
<form class="w-50" method="POST" action="{{ route('video.update', $item->id) }}">
@csrf
@method("put")
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="title">Video</label>
    <input type="text" class="form-control" id="title"  autofocus value="{{ $item->title }}" name="title" placeholder="Enter video name">
    
</div>
    
<div class="form-group">
    <label for="url">Link</label>
    <input type="text" class="form-control" id="url" name="url" value="{{ $item->url }}" placeholder="Enter video link">
    <a href="#url"> </a>
</div>
    <div class="form-group">
    <label for="photo_categories_id">Video Categories</label>
    <select class="form-control" id="video_categories_id" name="video_categories_id">
        <option value="">Select Video Category</option>
        @foreach($videoCategory as $category)
            <option {{ $item->video_categories_id==$category->id?"selected":"" }} 
            value="{{ $category->id }}">{{ $category->name }}
            </option>
        @endforeach
    </select>
</div>



  <button type="submit" class="btn btn-primary">Store</button>
  <a class="btn btn-dark" href="{{ route('video.index')}}">Cancel</a>
</form>
@endsection
