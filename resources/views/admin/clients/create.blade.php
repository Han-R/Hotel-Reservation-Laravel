@extends("layouts._admin")

@section("title", "Add New Event")

@section("content")
<form class="w-50" method="POST" action="{{ route('event.store') }}">
@csrf
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="event_name">Event Name</label>
    <input autofocus value="{{ old('event_name') }}" type="text" class="form-control" id="event_name" name="event_name" placeholder="Event Name">
    </div>

    <div class="form-group">
    <label for="event_date">Event Date</label>
    <input autofocus value="{{ old('event_date') }}" type="date" class="form-control" id="event_date" name="event_date" placeholder="Event Date">
    </div>

     <div class="form-group">
      <input value="{{ old('image') }}" type="hidden" class="form-control" id="image" name="image" placeholder="Image">
      <a title="Images Browse" href="{{ route('photo.browse') }}" class="btn mb-2 iframe btnSelectImage btn-primary"> <i class='flaticon-photo-camera'></i> <span>Select event image</span></a>
      <div class="imgShow"></div>
    </div>
   
    
  <button type="submit" class="btn btn-primary">Add</button>
  <a class="btn btn-dark" href="{{ route('event.index') }}">Cancel</a>
</form>
@endsection

@section("js")
  <script>
    function setImage(imageId, imageUrl){
      imageUrl = imageUrl.replace(/^.*[\\\/]/, '')
      $("#image").val(imageUrl);
      $(".imgShow").html('<img src="/storage/images/'+imageUrl+'" class="img-thumbnail w-50" />');
      $("#iframeModal").modal("hide");
    }
    if($("#image").val()!=''){
      $(".imgShow").html('<img src="/storage/images/'+$("#image").val()+'" class="img-thumbnail w-50" />');
    }
  </script>
@endsection
