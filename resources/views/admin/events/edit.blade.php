@extends("layouts._admin")

@section("title","Update Event")

@section("content")
<div id="app">
    <form class="w-50" method="POST" action="{{route('event.update',$item->id)}}">
        @csrf
        @method("put")

        <div class="form-group">
            <label for="event_name">Event Name</label>
            <input autofocus value="{{ $item->event_name }}" type="text" class="form-control" id="event_name" name="event_name" placeholder="Event Name">
        </div>

        <div class="form-group">
            <label for="event_date">Event Date</label>
            <input  value="{{ $item->event_date }}" type="date" class="form-control" id="event_date" name="event_date" placeholder="Event Date">
        </div>

        <div class="form-group notCode">
            <input value="{{ $item->image }}" type="hidden" class="form-control" id="image" name="image">
            <a title="Images Browse" href="{{ route('photo.browse') }}" class="btn mb-2 iframe btnSelectImage btn-primary"> <i class='flaticon-photo-camera'></i> <span>Select Event Image</span></a>
            <div class="imgShow"></div>
        </div>

        
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-dark" href="{{ route('event.index') }}">Cancel</a>		
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
