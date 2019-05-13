@extends("layouts._admin")

@section("title","Update Period")

@section("content")
<div id="app">
    <form class="w-50" method="POST" action="{{route('restaurant-time.update',$item->id)}}">
        @csrf
        @method("put")

        <div class="form-group">
         <label for="time">Period Name</label>
         <input autofocus value="{{ $item->time }}" type="text" class="form-control" id="time" name="time" placeholder="Period Name">
        </div>

        <div class="form-group m-form__group row">
				  <label class="col-form-label col-lg-3 col-sm-12">Opening Hour</label>
				  <div class="col-lg-4 col-md-9 col-sm-12">
					  <input value="{{ $item->opening_hours }}" class="form-control" id="m_timepicker_1" name="opening_hours" readonly placeholder="Select time" type="text" />
				  </div>
        </div>

        <div class="form-group m-form__group row">
				  <label class="col-form-label col-lg-3 col-sm-12">Closing Hour</label>
				  <div class="col-lg-4 col-md-9 col-sm-12">
					  <input value="{{ $item->closing_hours }}" class="form-control" id="m_timepicker_1" name="closing_hours" readonly placeholder="Select time" type="text" />
				  </div>
		    </div>

        
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-dark" href="{{ route('restaurant-time.index') }}">Cancel</a>		
    </form>
</div>
   
@endsection




