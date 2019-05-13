@extends("layouts._admin")

@section("title", "Slider-Trash")

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
                    <th>Title</th>
                    
                    <th width="20%">Last Update</th>
                    <th width="15%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td class="text-right">           
                        <a class="btn btn-sm confirm btn-warning" href='{{ route("slider.restore", ["id" => $item->id]) }}'><i class='fa fa-redo'></i>Restore</a>
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
