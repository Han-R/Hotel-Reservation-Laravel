@extends("layouts._admin")

@section("title", "Add New Video Category ")

@section("content")
<form class="w-50" method="POST" action="{{ route('video-category.store') }}">
@csrf
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="name">Video Category</label>
    <input autofocus value="{{ old('name') }}" type="text" class="form-control" id="name" name="name" placeholder="Add video category">
    
</div>
  <button type="submit" class="btn btn-primary">Add</button>
  <a class="btn btn-dark" href="{{ route('video-category.index') }}">Cancel</a>
</form>
@endsection
