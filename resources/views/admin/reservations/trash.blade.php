@extends("layouts._admin")

@section("title", "Image-Trash")

@section("content")
    
<form class="row mb-3">
        <div class="col-sm-3">
            <select class="form-control" id="client_id" name="client_id">
                <option value="">All Clients</option>
                @foreach($clients as $client)
                    <option {{ request()->client_id ==$client->id?"selected":"" }} value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3">
            <select class="form-control" id="room_id" name="room_id">
                <option value="">All Rooms</option>
                @foreach($rooms as $room)
                    <option {{ request()->room_id ==$room->id?"selected":"" }} value="{{ $room->id }}">{{ $room->room_type }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-primary"><i class='fa fa-search'></i>Search</button>
        </div>
        
    </form>
    @if($items->total()>0)
        <div class="alert alert-info mb-3">found {{ $items->total() }} Results of search operation</div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th width="10%">Client Name</th>
                    <th width="10%">Room Type</th>
                    <th width="10%">Check In</th>
                    <th width="10%">Check Out</th>
                    <th width="15%">Cancel</th>
                    <th width="20%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->room->room_type}}</td>
                    <td>{{ $item->check_in}}</td>
                    <td>{{ $item->check_out}}</td>
                    <td><input type="checkbox" {{ $item->cancel?"checked":""}} disabled /></td>
                    <td class="text-right">           
                        <a class="btn btn-sm confirm btn-warning"  href='{{ route("reservation.restore", ["id" => $item->id]) }}'><i class='fa fa-redo'></i> Restore</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $items->links() }}
    @else
        <div class="alert alert-warning">
              Sorry there is no results to show!!:(
        </div>
    @endif
@endsection
