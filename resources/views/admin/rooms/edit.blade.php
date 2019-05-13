@extends("layouts._admin")

@section("title","Update Room")

@section("content")
<div id="app">
    <form class="w-50" method="POST" action="{{route('room.update',$item->id)}}">
        @csrf
        @method("put")

    <div class="form-group">
      <label for="room_type_id">Room Type</label>
      <select class="form-control" id="room_type_id" name="room_type_id">
        <option value="">Select room type</option>
        @foreach($room_types as $room_type)
            <option {{$item->room_type_id==$room_type->id?"selected":"" }} value="{{ $room_type->id }}">{{ $room_type->room_type }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
     <label for="description">Room Description</label>
     <textarea name="description" class="form-control" data-provide="markdown" rows="10">
       {{$item->description}}
     </textarea>                    
    </div>

        
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-dark" href="{{ route('room.index') }}">Cancel</a>		
    </form>
</div>
   
@endsection



