<table class="table table-striped table-advance table-hover">
    <h4><i class="fa fa-angle-right"></i> Category Table  </h4>
    <hr>
    <thead>
    <tr>
        <th><i class="fa fa-bullhorn"></i> Category_id</th>
        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Name</th>
        <th><i class="fa fa-bookmark"></i> Class</th>
        <th>Numbers</th>
        <th><i class=" fa fa-edit"></i> Status</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr name="{{$category->id}}">
            <td name="category_id"><a href="{{url("/category/$category->category_id")}}">{{$category->category_id}}</a> </td>
            <td class="hidden-phone" name="category_name"><a href="{{url("/category/$category->category_id")}}">{{$category->name}}</a></td>
            <td name="class">{{$category->class}}</td>
            <td name="count">{{$category_sCounts[$category->category_id]}}</td>
            <td><span class="label label-info label-mini"><a style="color:white" href={{url("/goods/category/$category->category_id/category_s/1")}}> 查看货物 </a></span></td>
            <td name="operate">
                <button class="btn btn-success btn-xs" name="check" style="display: none"><i class="fa fa-check"></i></button>
                <button class="btn btn-primary btn-xs" name="edit" @if($category_sCounts[$category->category_id] != 0) disabled="disabled" @endif><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger btn-xs" name="delete" @if($category_sCounts[$category->category_id] != 0) disabled="disabled" @endif><i class="fa fa-trash-o "></i></button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>