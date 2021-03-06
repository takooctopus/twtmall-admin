@extends('layouts.base')
@section('content')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> User</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <p>There you can add edit delete users</p>
                    <p id="users-count-describe">There are <<{{$usersCount}}>> users!!!!</p>
                </div>
            </div>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="col-md-offset-8">
                        {{--Search Form!!!!!--}}
                        <form class="form-horizontal" id="searchForm" action="#">
                            <div class="form-group">
                                <label for="firstname" class="col-md-1 control-label"><i class="fa fa-search"></i> </label>
                                <div class="col-md-10">
                                    <input type="text" id="searchinfo" class="form-control" placeholder="email/username/stunumber">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="content-panel" id="user-table">
                        @include('admin.user.usertable')
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


            $("#searchinfo").change(function(){
                var searchinfo = $("#searchinfo").val();
                $.ajax({
                    type: "GET",
                    url: "user/ajaxIndex",
                    data:  {'searchinfo':searchinfo},
                    success: function (data) {
                        console.log(data);
                        $('#user-table').empty();
                        $('#user-table').append(data['usertable']);
                        $('p#users-count-describe').text("There are <<" + data['usersCount']+ ">> users!!!!");
                    }
                });
            });


        });
    </script>
@endsection