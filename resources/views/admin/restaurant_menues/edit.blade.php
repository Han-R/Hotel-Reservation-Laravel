@extends("layouts._admin")

@section("title","Update Product")

@section("content")
<div id="app">
    <form class="w-50" method="POST" action="{{route('restaurant-menu.update',$item->id)}}">
        @csrf
        @method("put")

        <div class="form-group">
           <label for="product">Product Name</label>
           <input autofocus value="{{ $item->product }}" type="text" class="form-control" id="product" name="product" placeholder="Product Name">
        </div>

        <div class="form-group">
          <label for="price">Price</label>
          <input value="{{ $item->price }}"  class="form-control" id="price" name="price" placeholder="Product Price">
        </div>

        <div class="form-group notCode">
            <input value="{{ $item->image }}" type="hidden" class="form-control" id="image" name="image">
            <a title="Images Browse" href="{{ route('photo.browse') }}" class="btn mb-2 iframe btnSelectImage btn-primary"> <i class='flaticon-photo-camera'></i> <span>Select Event Image</span></a>
            <div class="imgShow"></div>
        </div>

        
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-dark" href="{{ route('restaurant-menu.index') }}">Cancel</a>		
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
