@extends("layouts._admin")

@section("title", "User Update")

@section("content")
<form class="w-50" method="POST" action="{{ route('users.update', $item->id) }}">
@csrf
@method("put")
  <div class="form-group">
    <label for="name">User Name</label>
    <input autofocus value="{{ $item->name }}" type="text" class="form-control" id="name" name="name" placeholder="User Name">
    
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input autofocus value="{{ $item->email }}" type="text" class="form-control" id="email" name="email" placeholder="Email">
    
</div>
  <button type="submit" class="btn btn-primary">Store</button>
  <a class="btn btn-dark" href="{{ route('users.index') }}">Cancel</a>
</form>
@endsection
