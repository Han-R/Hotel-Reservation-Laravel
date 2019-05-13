@extends("layouts._admin")

@section("title", "Periods Management")

@section("content")
    
    <form class="row">
        <div class="col-sm-3">
            <input type="text" value='{{ request()->q }}' placeholder="Enter search word.." name="q" autofocus class="form-control" />
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary"><i class='fa fa-search'></i> Search</button>
        </div>
        <div class="col-sm-3">
            <a class="btn btn-success float-right mb-3" href="{{ route('restaurant-time.create') }}"><i class='fa fa-plus'></i> Add New Period</a>
        </div>
    </form>
    @if($items->total()>0)
        <div class="alert alert-info mb-3">found {{ $items->total() }} Results for search operation</div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    
                    <th width="13%">Period Name</th>
                    <th width="10%">Opening Hour</th>
                    <th width="10%">Closing Hour</th>
                    <th width="20%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->time }}</td>
                    <td>{{ $item->opening_hours }}</td>
                    <td>{{ $item->closing_hours }}</td>
                    <td class="text-right">           
                        <a class="btn btn-sm btn-primary" href='{{ route("restaurant-time.edit", ["id" => $item->id]) }}'><i class='fa fa-edit'></i> Update</a>  
                        <a class="btn btn-sm btn-danger confirm" href='{{ route("restaurant-time.delete", $item->id) }}'><i class='fa fa-trash'></i> Delete</a>
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
