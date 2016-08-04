@extends('layouts.base')

@section('content')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> User</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <p>There you can add edit delete users</p>
                    <p>There are <<{{$usersCount}}>> users!!!!</p>
                </div>
            </div>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> User Table</h4>
                            <div class="col-md-12 col-md-offset-10">
                                <form id="search" action="#">
                                    <i class="fa fa-search"></i> <input />
                                </form>

                                <div id="searchData">

                                </div>
                                <div id="postRequestData">

                                </div>

                                <div class="row col-lg-5">
                                    <h2>Register Form</h2>
                                    <form id="register" action="#">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <label for="firstname"></label>
                                        <input type="text" id="firstname" class="form-control">

                                        <input type="submit" value="Register" class="btn btn-default">
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <thead>
                            <tr>
                                <th class="hidden-phone"><i class="fa fa-question-circle"></i> Email</th>
                                <th><i class="fa fa-bookmark"></i> Username</th>
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

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){
            $("#search").click(function(){
                $.get('search',function (data) {
                    $('#searchData').append(data);
                });
            });
            
            $("#register").submit(function () {
                var fname = $("#firstname").val();

               /* $.post('register',{firstname:fname},function (data) {
                    console.log(data);
                    $("#postRequestData").html(data);
                });*/

                var dataString = "firstname="+fname;
                $.ajax({
                    type: "POST",
                    url: "register",
                    data: dataString,
                    success: function (data) {
                        console.log(data);
                        $('#postRequestData').html(data);
                    }
                });
            });

        });
    </script>
@endsection