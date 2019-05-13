@extends("layouts._admin")

@section("title", "Add New Room Type")

@section("content")
<form class="w-50" method="POST" action="{{ route('room-type.store') }}">
@csrf
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="room_type">Room Type</label>
    <input autofocus value="{{ old('room_type') }}" type="text" class="form-control" id="room_type" name="room_type" placeholder="Room Type">
  </div>

    <div class="form-group">
      <label for="price">Price</label>
      <input value="{{ old('price') }}"  class="form-control" id="price" name="price" placeholder="Price">
    </div>

    <div class="form-group">
      <label for="capacity">Capacity</label>
      <input value="{{ old('capacity') }}"  class="form-control" id="capacity" name="capacity" placeholder="Capacity">
    </div>

    <div class="form-group">
   <label for="description">Room Description</label>
   <textarea name="description" class="form-control" data-provide="markdown" rows="10">
     {{old('description')}}
   </textarea>                    
</div>

     <div class="form-group">
      <input value="{{ old('image') }}" type="hidden" class="form-control" id="image" name="image" placeholder="Image">
      <a title="Images Browse" href="{{ route('photo.browse') }}" class="btn mb-2 iframe btnSelectImage btn-primary"> <i class='flaticon-photo-camera'></i> <span>Select room image</span></a>
      <div class="imgShow"></div>
    </div>
   
    
  <button type="submit" class="btn btn-primary">Add</button>
  <a class="btn btn-dark" href="{{ route('room-type.index') }}">Cancel</a>
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
