@extends("layouts._admin")

@section("title", "Client-Trash")

@section("content")
    
    <form class="row mb-3">
        <div class="col-sm-3">
            <input type="text" value='{{ request()->q }}' placeholder="Enter search word.." name="q" autofocus class="form-control" />
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary"><i class='fa fa-search'></i>Search</button>
        </div>
    </form>
    @if($items->total()>0)
        <div class="alert alert-info mb-3">found {{ $items->total() }}Results of search operation</div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                
                    
                    <th width="10%">Name</th>
                    <th width="13%">Email</th>
                    <th width="13%">Phone</th>
                    <th width="13%">Address</th>
                    <th width="13%">No_Of_adults</th>
                    <th width="13%">No_Of_Children</th>
                    <th width="20%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->no_of_adults }}</td>
                    <td>{{ $item->no_of_children }}</td>
                    <td class="text-right">           
                        <a class="btn btn-sm confirm btn-warning" href='{{ route("client.restore", ["id" => $item->id]) }}'><i class='fa fa-redo'></i> Restore</a>
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
