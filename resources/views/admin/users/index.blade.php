@extends("layouts._admin")

@section("title", "Users Management")

@section("content")
    
    <form class="row">
        <div class="col-sm-3">
            <input type="text" value='{{ request()->q }}' placeholder="Enter search word.." name="q" autofocus class="form-control" />
        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn btn-primary"><i class='fa fa-search'></i>Search</button>
        </div>
        <div class="col-sm-3">
            <a class="btn btn-success float-right mb-3" href="{{ route('users.create') }}"><i class='fa fa-plus'></i>Add New User</a>
        </div>
    </form>
    @if($items->total()>0)
        <div class="alert alert-info mb-3">found {{ $items->total() }}Results of search operation</div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th width="20%">Last Update</th>
                    <th width="15%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td class="text-right">           
                        <a class="btn btn-sm btn-warning" href='{{ route("users.links", ["id" => $item->id]) }}' title='Permissions'><i class='fa fa-lock'></i></a>  
                        <a class="btn btn-sm btn-primary" href='{{ route("users.edit", ["id" => $item->id]) }}' title='Update'><i class='fa fa-edit'></i></a>  
                        <a class="btn btn-sm btn-danger confirm" href='{{ route("users.delete", $item->id) }}' title='Delete'><i class='fa fa-trash'></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $items->links() }}
    @else
        <div class="alert alert-warning">
               Sorry, there is no results to show:(
        </div>
    @endif
@endsection
