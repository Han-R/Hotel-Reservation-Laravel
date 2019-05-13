@extends("layouts._admin")

@section("title", "New User")

@section("content")
<form class="w-50" method="POST" action="{{ route('users.store') }}">
@csrf
  <div class="form-group">
    <label for="name">User Name</label>
    <input autofocus value="{{ old('name') }}" type="text" class="form-control" id="name" name="name" placeholder="User Name">
    
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" placeholder="Email Address">
    
</div>
<div class="form-group">
    <label for="password">password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="password">
    
</div>
  <button type="submit" class="btn btn-primary">Add</button>
  <a class="btn btn-dark" href="{{ route('users.index') }}">Cancel</a>
</form>
@endsection
