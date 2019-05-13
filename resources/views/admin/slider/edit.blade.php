@extends("layouts._admin")

@section("title","Update Slider")

@section("content")
<div id="app">
    <form class="w-50" method="POST" action="{{route('slider.update',$item->id)}}">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="title">Title</label>
            <input autofocus value="{{ $item->title }}" type="text" class="form-control" id="title" name="title" placeholder="Title">
        </div>
        
        
        <div class="form-group">
        <label for="title">Sub Title</label>
        <input value="{{ $item->subtitle }}" type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Title">
        </div>
        
        <div class="form-group">
        <label for="button_text">Button Text</label>
        <input value="{{ $item->button_text }}" type="text" class="form-control" id="button_text" name="button_text" placeholder="Button Text">
        </div>
        <div class="form-group">
            <label for="url">Link</label>
            <input value="{{ $item->url }}" type="text" class="form-control" id="url" name="url" placeholder="Link">
        </div>
        
        <div class="form-group notCode">

            <input value="{{ $item->image }}" type="hidden" class="form-control" id="image" name="image">
            <a title="Images Browse" href="{{ route('photo.browse') }}" class="btn mb-2 iframe btnSelectImage btn-primary"> <i class='flaticon-photo-camera'></i> <span>Select Slider Image</span></a>
            <div class="imgShow"></div>
        </div>
        
    <div class="form-group">
<div class="custom-control custom-checkbox">
  <input type="hidden" name="active" value="0" />
  <input  {{ $item->active?"checked":"" }} value="1" type="checkbox" name="active" class="custom-control-input" id="customCheck1">
  <label class="custom-control-label" for="customCheck1">Slider Activity</label>
</div>
</div>
        
        
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-dark" href="{{ route('slider.index') }}">Cancel</a>		
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
