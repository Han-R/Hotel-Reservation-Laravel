@extends("layouts._admin")

@section("title", "Update Video Category")

@section("content")
<form class="w-50" method="POST" action="{{ route('video-category.update', $item->id) }}">
@csrf
@method("put")
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="name">Video Category</label>
    <input autofocus value="{{ $item->name }}" type="text" class="form-control" id="name" name="name" placeholder="Video Category">
    
</div>
  <button type="submit" class="btn btn-primary">Store</button>
  <a class="btn btn-dark" href="{{ route('video-category.index') }}">Cancel</a>
</form>
@endsection
