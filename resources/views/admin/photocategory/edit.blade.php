@extends("layouts._admin")

@section("title", "Update Image Category")

@section("content")
<form class="w-50" method="POST" action="{{ route('photo-category.update', $item->id) }}">
@csrf
@method("put")
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="name">Image Category</label>
    <input autofocus value="{{ $item->name }}" type="text" class="form-control" id="name" name="name" placeholder="Image Category">
    
</div>

  
<div class="form-group">
  <div class="custom-control custom-checkbox">
    <input type="hidden" name="published" value="0" />
    <input  {{ $item->published?"checked":"" }} type="checkbox" value="1" name="published" class="custom-control-input" id="customCheck1">
    <label class="custom-control-label" for="customCheck1">Image Category Publish</label>
  </div>
</div>
  <button type="submit" class="btn btn-primary">Store</button>
  <a class="btn btn-dark" href="{{ route('photo-category.index') }}">Cancel</a>
</form>
@endsection
