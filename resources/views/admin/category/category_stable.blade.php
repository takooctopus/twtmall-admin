<table class="table table-striped table-advance table-hover">
    <h4><i class="fa fa-angle-right"></i> Category Table</h4>
    <hr>
    <thead>
    <tr>
        <th><i class="fa fa-bullhorn"></i> Category_id</th>
        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Name</th>
        <th><i class="fa fa-bookmark"></i> Upper Category</th>
        <th><i class="fa fa-beer"></i>Upper Category Name</th>
        <th>Count</th>
        <th><i class=" fa fa-edit"></i> Status</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($category_ss as $category_s)
        <tr name="{{$category_s->id}}">
            <td name="category_id"><p>{{$category_s->category_id}}</p></td>
            <td name="category_name" class="hidden-phone"><p>{{$category_s->name}}</p></td>
            <td name="b_id">{{$category_s->b_id}}</td>
            <td>{{$categoryName}}</td>
            <td>number</td>
            <td><span class="label label-info label-mini"><a style="color:white" href={{url("/goods/category/$category_s->b_id/category_s/$category_s->category_id")}}> 查看货物 </a></span></td>
            <td name="operate">
                <button class="btn btn-success btn-xs" name="check" style="display: none" @if($category_s->id == 1) disabled="disabled" @endif><i class="fa fa-check"></i></button>
                <button class="btn btn-primary btn-xs" name="edit" @if($category_s->id == 1) disabled="disabled" @endif><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger btn-xs" name="delete" @if($category_s->id == 1) disabled="disabled" @endif><i class="fa fa-trash-o "></i></button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>