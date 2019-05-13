@extends("layouts._admin")

@section("title", "Add New Video")

@section("content")
<form class="w-50" method="POST" action="{{ route('video.store') }}">
@csrf
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="title">Video</label>
    <input type="text" autofocus value="{{ old('title') }}" class="form-control" id="title" name="title" placeholder="Enter name of video">
    
</div>
    
<div class="form-group">
    <label for="url">Link</label>
    <input type="text"  value="{{ old('url') }}"class="form-control" id="url" name="url" placeholder="Enter video link">
    <a href="#url"> </a>
</div>
    <div class="form-group">
    <label for="photo_categories_id">Video Categories</label>
    <select class="form-control" id="video_categories_id" name="video_categories_id">
        <option value="">Select Video Category</option>
        @foreach($videoCategory as $category)
            <option {{ old("video_categories_id")==$category->id?"selected":"" }} 
            value="{{ $category->id }}">{{ $category->name }}
            </option>
        @endforeach
    </select>
</div>



  <button type="submit" class="btn btn-primary">Add</button>
  <a class="btn btn-dark" href="{{ route('video.index')}}">Cancel</a>
</form>
@endsection
