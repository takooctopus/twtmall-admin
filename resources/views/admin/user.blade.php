@extends('layouts.base')
@section('content')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> User</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <p>There you can add edit delete users</p>
                </div>
            </div>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> User Table</h4>
                            <hr>
                            <thead>
                            <tr>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Email</th>
                                <th><i class="fa fa-bookmark"></i> Username</th>
                                <th>Realname</th>
                                <th><i class=" fa fa-edit"></i> Campus</th>
                                <th>Stunumber</th>
                                <th>Phone</th>
                                <th>Wechat</th>
                                <th>Qq</th>
                                <th>imgurl</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->realname}}</td>
                                    <td class="hidden-phone">{{$user->campus}}</td>
                                    <td>{{$user->stunumber}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->wechat}}</td>
                                    <td>{{$user->qq}}</td>
                                    <td>{{$user->imgurl}}</td>
                                    <td><a href="{{url("user/$user->username/detail")}}"><span class="label label-info label-mini">check</span></a></td>
                                    <td>
                                        <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                    </td>
                                    {{$users->render()}}
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