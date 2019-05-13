@extends("layouts._admin")

@section("title","Update Table")

@section("content")
<div id="app">
    <form class="w-50" method="POST" action="{{route('restaurant-table.update',$item->id)}}">
        @csrf
        @method("put")

        <div class="form-group">
            <label for="capacity">Table Capacity</label>
            <input autofocus value="{{ $item->capacity }}" class="form-control" id="capacity" name="capacity" placeholder="Table Capacity">
        </div>

        
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-dark" href="{{ route('restaurant-table.index') }}">Cancel</a>		
    </form>
</div>
   
@endsection




