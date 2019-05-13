@extends("layouts._admin")

@section("title", "Tables Management")

@section("content")
    
    <form class="row">
        <div class="col-sm-3">
            <input type="text" value='{{ request()->q }}' placeholder="Enter search word.." name="q" autofocus class="form-control" />
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary"><i class='fa fa-search'></i> Search</button>
        </div>
        <div class="col-sm-3">
            <a class="btn btn-success float-right mb-3" href="{{ route('restaurant-table.create') }}"><i class='fa fa-plus'></i> Add New Table</a>
        </div>
    </form>
    @if($items->total()>0)
        <div class="alert alert-info mb-3">found {{ $items->total() }} Results for search operation</div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    
                    
                    <th width="10%">Table Number</th>
                    <th width="13%">Table Capacity</th>
                    <th width="20%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->capacity }}</td>
                    <td class="text-right">           
                        <a class="btn btn-sm btn-primary" href='{{ route("restaurant-table.edit", ["id" => $item->id]) }}'><i class='fa fa-edit'></i> Update</a>  
                        <a class="btn btn-sm btn-danger confirm" href='{{ route("restaurant-table.delete", $item->id) }}'><i class='fa fa-trash'></i> Delete</a>
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
