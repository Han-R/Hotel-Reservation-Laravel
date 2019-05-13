@extends("layouts._admin")

@section("title", "User Permissions" . " - " . $item->name)

@section("content")
<form class="w-50" method="POST" action="{{ route('users.post.links', $item->id) }}">
@csrf
    
    <div class="form-group">
        <ul class="list-unstyled">
            @foreach($links->where('parent_id',0) as $link)
            <?php
                //dd($link->users);
                $checked = $link->users()->where('users_id', $item->id)->count();
            ?>
            <li>
                <label><input value='{{$link->id}}' name="links[]" {{ $checked?"checked":"" }} type="checkbox" /> <!--i class='{{ $link->icon }}'></i--> <b>{{ $link->title }}</b></label>
                <ul class="ml-4 list-unstyled">
                    @foreach($links->where('parent_id',$link->id) as $sublink)
                    <?php
                        $checked2 = $sublink->users()->where('users_id', $item->id)->count();
                    ?>
                    <li>
                        <label><input value='{{$sublink->id}}' name="links[]" {{ $checked2?"checked":"" }} type="checkbox" />  {{ $sublink->title }}</label>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>

    <button type="submit" class="btn btn-primary">Store</button>
    <a class="btn btn-dark" href="{{ route('users.index') }}">Cancel</a>
</form>
@endsection


@section("js")
    <script>
        $(":checkbox").click(function(){
            //الاب واولادة يكونو زي بعض ضوينا الاب يضوو الاولاد
            $(this).parent().next().find(":checkbox").prop("checked", $(this).prop("checked"));  
            
            var atLeastOne = $(this).closest("ul").find(":checked").length>0;
            $(this).closest("ul").prev().find(":checkbox").prop("checked",atLeastOne);
        })
        /*$(":checkbox").change(function(){
            $(this).parent().next().find(":checkbox").prop("disabled", !$(this).prop("checked"));  
        }).change();*/
    </script>
@endsection