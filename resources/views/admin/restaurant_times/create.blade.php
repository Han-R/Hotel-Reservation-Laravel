@extends("layouts._admin")

@section("title", "Add New Period")

@section("content")
<form class="w-50" method="POST" action="{{ route('restaurant-time.store') }}">
@csrf
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
     <label for="time">Period Name</label>
     <input autofocus value="{{ old('time') }}" type="text" class="form-control" id="time" name="time" placeholder="Period Name">
  </div>

    <div class="form-group m-form__group row">
				<label class="col-form-label col-lg-3 col-sm-12">Opening Hour</label>
				<div class="col-lg-4 col-md-9 col-sm-12">
					<input class="form-control" id="m_timepicker_1" name="opening_hours" readonly placeholder="Select time" type="text" />
				</div>
    </div>
    
    <div class="form-group m-form__group row">
				<label class="col-form-label col-lg-3 col-sm-12">Closing Hour</label>
				<div class="col-lg-4 col-md-9 col-sm-12">
					<input class="form-control" id="m_timepicker_1" name="closing_hours" readonly placeholder="Select time" type="text" />
				</div>
		</div>
   
   
  <button type="submit" class="btn btn-primary">Add</button>
  <a class="btn btn-dark" href="{{ route('restaurant-time.index') }}">Cancel</a>
</form>
@endsection

@section("js")
<script src="{{asset('metronic/assets/demo/default/custom/crud/forms/widgets/bootstrap-timepicker.js')}}" type="text/javascript"></script> 
@endsection
