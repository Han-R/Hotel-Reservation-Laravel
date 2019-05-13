@extends("layouts._admin")

@section("title", "Events Management")

@section("content")
    
    <form class="row">
        <div class="col-sm-3">
            <input type="text" value='{{ request()->q }}' placeholder="Enter search word.." name="q" autofocus class="form-control" />
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary"><i class='fa fa-search'></i> Search</button>
        </div>
        <div class="col-sm-3">
            <a class="btn btn-success float-right mb-3" href="{{ route('event.create') }}"><i class='fa fa-plus'></i> Add New Event</a>
        </div>
    </form>
    @if($items->total()>0)
        <div class="alert alert-info mb-3">found {{ $items->total() }} Results for search operation</div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    
                    
                    <th width="10%">Name</th>
                    <th width="13%">Date</th>
                    <th width="20%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->event_name }}</td>
                    <td>{{ $item->event_date }}</td>
                    <td class="text-right">           
                        <a class="btn btn-sm btn-primary" href='{{ route("event.edit", ["id" => $item->id]) }}'><i class='fa fa-edit'></i> Update</a>  
                        <a class="btn btn-sm btn-danger confirm" href='{{ route("event.delete", $item->id) }}'><i class='fa fa-trash'></i> Delete</a>
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
