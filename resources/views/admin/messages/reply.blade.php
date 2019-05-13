@extends("layouts._admin")

@section("title", "Messages Replying")

@section("content")
   
    <form class="row mb-3" method="POST" action="{{route('message.sendReply',$item->id)}}">
        @csrf

        <div class="form-group pr-3">
            <label for="q">Reply To</label>
            <input type="text" value='{{ request()->q }}' placeholder="Enter your replying.." name="q"  class="form-control" />
        </div>

        <div class="form-group pr-3">
            <label for="name">Name</label>
            <input autofocus value="{{ $item->name }}" type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>

        <div class="form-group mt-5">
           <button type="submit" class="btn btn-primary">Send</button>
           <a class="btn btn-dark" href="{{ route('message.index') }}">Cancel</a>
        </div>

    </form>

@endsection
