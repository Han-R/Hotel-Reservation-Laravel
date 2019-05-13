@extends("layouts._admin")

@section("title", "Rooms Management")

@section("content")
    
    <form class="row">

        <div class="col-sm-3">
            <select class="form-control" id="room_type_id" name="room_type_id">
                <option value="">Room Type</option>
                @foreach($room_types as $room_type)
                    <option {{ request()->room_type_id ==$room_type->id?"selected":"" }} value="{{ $room_type->id }}">{{ $room_type->room_type }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary"><i class='fa fa-search'></i> Search</button>
        </div>
        <div class="col-sm-3">
            <a class="btn btn-success float-right mb-3" href="{{ route('room.create') }}"><i class='fa fa-plus'></i> Add New Room</a>
        </div>
    </form>
    @if($items->total()>0)
        <div class="alert alert-info mb-3">found {{ $items->total() }} Results for search operation</div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    
                    
                    <th width="10%">Room Type</th>
                    <th width="13%">Room Description</th>
                    <th width="20%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->roomType->room_type }}</td>
                    <td>{{ $item->description }}</td>
                    <td class="text-right">           
                        <a class="btn btn-sm btn-primary" href='{{ route("room.edit", ["id" => $item->id]) }}'><i class='fa fa-edit'></i> Update</a>  
                        <a class="btn btn-sm btn-danger confirm" href='{{ route("room.delete", $item->id) }}'><i class='fa fa-trash'></i> Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $items->links() }}
    @else
        <div class="alert alert-warning">
             Sorry, there is no results to show :(
        </div>
    @endif
@endsection
