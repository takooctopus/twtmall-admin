@extends('layouts.base')
@section('content')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> Category <button type="button" class="btn btn-theme pull-right">Create New Category</button></h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <p>There you can add edit delete categories</p>
                </div>
            </div>

            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
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
                                <tr>
                                    <td><a href="{{url("/category/$category->category_id")}}">{{$category->category_id}}</a></td>
                                    <td class="hidden-phone"><a href="{{url("/category/$category->category_id")}}">{{$category->name}}</a></td>
                                    <td>{{$category->class}}</td>
                                    <td>{{$category_sCounts[$category->category_id-1]}}</td>
                                    <td><span class="label label-info label-mini">Due</span></td>
                                    <td>
                                        <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mt">
                <div class="col-lg-12">
                    <h3><i class="fa fa-angle-right"></i> {{$categoryName}} <button type="button" class="btn btn-theme pull-right">Create New Category_s</button></h3>
                    <p>There you can add edit delete categories_s</p>
                </div>
            </div>

            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
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
                                <tr>
                                    <td>{{$category_s->category_id}}</td>
                                    <td class="hidden-phone">{{$category_s->name}}</td>
                                    <td>{{$category_s->b_id}}</td>
                                    <td>{{$categoryName}}</td>
                                    <td>number</td>
                                    <td><span class="label label-info label-mini">Due</span></td>
                                    <td>
                                        <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection