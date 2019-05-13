@extends("layouts._admin")

@section("title", "Add New Table")

@section("content")
<form class="w-50" method="POST" action="{{ route('restaurant-table.store') }}">
@csrf
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="capacity">Capacity</label>
    <input autofocus value="{{ old('capacity') }}" class="form-control" id="capacity" name="capacity" placeholder="Table Capacity">
  </div>
   
    
  <button type="submit" class="btn btn-primary">Add</button>
  <a class="btn btn-dark" href="{{ route('restaurant-table.index') }}">Cancel</a>
</form>
@endsection


