@extends("layouts._admin")

@section("title", "Add Static page")

@section("content")
<form class="w-50" method="POST" action="{{ route('staticpage.store') }}">
@csrf
<!-- POST, PUT, Patch and Delete methods must have @csrf token in Laravel Web -->
  <div class="form-group">
    <label for="title">Title</label>
    <input autofocus value="{{ old('title') }}" type="text" class="form-control" id="title" name="title" placeholder="Title">
    </div>
     <div class="form-group">

      <input value="{{ old('image') }}" type="hidden" class="form-control" id="image" name="image" placeholder="Image">
      <a title="Images Browse" href="{{ route('photo.browse') }}" class="btn mb-2 iframe btnSelectImage btn-primary"> <i class='flaticon-photo-camera'></i> <span>Select Image for static page</span></a>
      <div class="imgShow"></div>
    </div>
    
    <!--add content of article-->
    <div class="form-group">
        <label for="details">Static Page Details</label>
          <textarea name="details" class="form-control" data-provide="markdown" rows="10">
          {{old('details')}}
          </textarea>    
    </div>
    <div class="form-group">
<div class="custom-control custom-checkbox">
  <input type="hidden" name="active" value="0" />
  <input  {{ old("active")?"checked":"" }} value="1" type="checkbox" name="active" class="custom-control-input" id="customCheck1">
  <label class="custom-control-label" for="customCheck1">Static Page Activity</label>
</div>
</div>
    
  <button type="submit" class="btn btn-primary">Add</button>
  <a class="btn btn-dark" href="{{ route('staticpage.index') }}">Cancel</a>
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
