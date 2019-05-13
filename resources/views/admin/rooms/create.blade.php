@extends("layouts._admin")

@section("title", "Add New Room")

@section("content")
<form class="w-50" method="POST" action="{{ route('room.store') }}">
@csrf
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
<div class="form-group">
    <label for="room_type_id">Room Type</label>
    <select class="form-control" id="room_type_id" name="room_type_id">
        <option value="">Select room type</option>
        @foreach($room_types as $room_type)
            <option {{ old("room_type_id")==$room_type->id?"selected":"" }} value="{{ $room_type->id }}">{{ $room_type->room_type }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
   <label for="description">Room Description</label>
   <textarea name="description" class="form-control" data-provide="markdown" rows="10">
     {{old('description')}}
   </textarea>                    
</div>
    
  <button type="submit" class="btn btn-primary">Add</button>
  <a class="btn btn-dark" href="{{ route('room.index') }}">Cancel</a>
</form>
@endsection


