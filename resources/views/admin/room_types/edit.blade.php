@extends("layouts._admin")

@section("title","Update Room-Type")

@section("content")
<div id="app">
    <form class="w-50" method="POST" action="{{route('room-type.update',$item->id)}}">
        @csrf
        @method("put")

        <div class="form-group">
         <label for="room_type">Room Type</label>
         <input autofocus value="{{ $item->room_type }}" type="text" class="form-control" id="room_type" name="room_type" placeholder="Room Type">
        </div>

    <div class="form-group">
      <label for="price">Price</label>
      <input value="{{ $item->price }}"  class="form-control" id="price" name="price" placeholder="Price">
    </div>

    <div class="form-group">
      <label for="capacity">Capacity</label>
      <input value="{{ $item->capacity }}"  class="form-control" id="capacity" name="capacity" placeholder="Capacity">
    </div>

    <div class="form-group">
   <label for="description">Room Description</label>
   <textarea name="description" class="form-control" data-provide="markdown" rows="10">
   {{ $item->description }}
   </textarea>                    
</div>

        <div class="form-group notCode">
            <input value="{{ $item->image }}" type="hidden" class="form-control" id="image" name="image">
            <a title="Images Browse" href="{{ route('photo.browse') }}" class="btn mb-2 iframe btnSelectImage btn-primary"> <i class='flaticon-photo-camera'></i> <span>Select Room Image</span></a>
            <div class="imgShow"></div>
        </div>

        
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-dark" href="{{ route('room-type.index') }}">Cancel</a>		
    </form>
</div>
   
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
