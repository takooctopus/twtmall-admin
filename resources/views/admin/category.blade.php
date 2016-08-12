@extends('layouts.base')
@section('content')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> Category<button class="btn btn-theme pull-right"
                                                                   data-toggle="modal" data-target="#addCategoryModal">Create New Category</button></h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <p>There you can add edit delete categories</p>
                </div>
            </div>

            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel" id="category-table">
                        @include('admin.category.categorytable')
                        @include('admin.category.addcategoryform')
                    </div>
                </div>
            </div>

            <div class="row mt">
                <div class="col-lg-12">
                    <h3><i class="fa fa-angle-right"></i> {{$categoryName}} <button class="btn btn-theme pull-right"
                                                                                    data-toggle="modal" data-target="#addCategory_sModal">Create New Category_s</button></h3>
                    <p>There you can add edit delete categories_s</p>
                </div>
            </div>

            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel" id="category_s-table">
                        @include('admin.category.category_stable')
                        @include('admin.category.addcategory_sform')
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
            $("#category-table tbody tr").each(function () {
                var id=$(this).attr("name");
                console.log(id);
                //点击edit按钮时
                $(this).find("button[name='edit']").click(function () {
                    $(this).hide();
                    $(this).parent().find("button[name='check']").show();
                    var category_id = $(this).parent().parent().find("td[name='category_id']").children("a").html();
                    console.log(category_id);

                    $(this).parent().parent().find("td[name='category_id']").empty();
                    var category_id_input = "<input type='text'class='form-control round-form' value="+ category_id +" placeholder="+ category_id + ">";
                    $(this).parent().parent().find("td[name='category_id']").append(category_id_input);

                    var category_name = $(this).parent().parent().find("td[name='category_name']").children("a").html();
                    var category_name_input = "<input type='text'class='form-control round-form' value="+ category_name + " placeholder="+ category_name + ">";
                    $(this).parent().parent().find("td[name='category_name']").empty();
                    $(this).parent().parent().find("td[name='category_name']").append(category_name_input);


                })
                //点击check按钮时
                $(this).find("button[name='check']").click(function () {
                    console.log("BBB");
                    $(this).hide();
                    $(this).parent().find("button[name='edit']").show();
                    var id = $(this).parent().parent().attr('name');
                    var category_id = $(this).parent().parent().find("td[name='category_id']").children("input").val();
                    var category_name = $(this).parent().parent().find("td[name='category_name']").children("input").val();
                    function ajaxcategorytable(id,category_id,category_name,_this) {
                        $.ajax({
                            type: "GET",
                            url: "category/ajaxcategorytable",
                            data:  {'id':id ,'category_id':category_id , 'category_name':category_name},
                            success: function (data) {
                                console.log(data);
                                var category_id_input_url = window.location.host + "/category/"+data['category_id'];
                                console.log(category_id_input_url);
                                var category_id_input = "<a href="+ category_id_input_url +">"+ data['category_id']+"</a>";
                                console.log(category_id_input);
                                $(_this).parent().parent().find("td[name='category_id']").empty();
                                $(_this).parent().parent().find("td[name='category_id']").append(category_id_input);

                                var category_name_input_url = window.location.host + "/category/"+data['category_id'];
                                var category_name_input = "<a href="+ category_id_input_url +">"+ data['category_name']+"</a>";
                                $(_this).parent().parent().find("td[name='category_name']").empty();
                                $(_this).parent().parent().find("td[name='category_name']").append(category_name_input);
                            }
                        });
                    }
                    javascript:ajaxcategorytable(id,category_id,category_name,$(this));
                })

                //点击delete按钮时
                $(this).find("button[name='delete']").click(function () {
                    var id = $(this).parent().parent().attr('name');
                    console.log(id);
                    function ajaxdeletecategory(id,_this){
                        $.ajax({
                            type: "GET",
                            url: "category/ajaxdeletecategory",
                            data:  {'id':id },
                            success: function (data) {
                                console.log(data);
                                $(_this).parent().parent().remove();
                            }
                        });
                    }
                    javascript:ajaxdeletecategory(id,$(this));
                })

            });

            //添加新的category
            $("#addcategorybutton").click(function () {
                var category_id = $("#addcatgoryform").find("input#category_id").val();
                var category_name = $("#addcatgoryform").find("input#category_name").val();
                var category_class = $("#addcatgoryform").find("input#category_class").val();
                $(this).parent().parent().find("#addcatgoryform input").attr("value","");
                function ajaxaddcategory(category_id,category_name,category_class,_this) {
                    $.ajax({
                        type: "GET",
                        url: "category/ajaxaddcategory",
                        data:  {'category_id':category_id , 'category_name':category_name , 'category_class':category_class},
                        success: function (data) {
                            console.log(data);
                            var category_add_html_url = window.location.host + "/category/"+data['category'].category_id;
                            var category_add_goods_url = window.location.host + "/goods/category/" + data['category'].category_id + "/category_s/1";
                            var category_add_html = "<tr name="+data['category'].id+">" +
                                    "<td name='category_id'><a href="+ category_add_html_url +">"+ data['category'].category_id +"</a> </td>" +
                                    "<td class='hidden-phone' name='category_name'><a href="+ category_add_html_url + ">"+ data['category'].name +"</a></td>" +
                                    "<td name='class'>"+ data['category'].class+ "</td>" +
                                    "<td name='count'>"+ data['category_sCount'] +"</td>"+
                                    "<td><span class='label label-info label-mini'><a href="+ category_add_goods_url +">查看货物</a></span></td>" +
                                    "<td name='operate'>" +
                                    "<button class='btn btn-success btn-xs' name='check' style='display: none'><i class='fa fa-check'></i></button>"+
                                    "<button class='btn btn-primary btn-xs' name='edit'><i class='fa fa-pencil'></i></button>"+
                                    "<button class='btn btn-danger btn-xs' name='delete'><i class='fa fa-trash-o '></i></button>" +
                                    "</td>" +
                                    "</tr>";
                            console.log(category_add_html);
                            $("#category-table tbody").append(category_add_html);


                        }
                    });
                }
                javascript:ajaxaddcategory(category_id,category_name,category_class,$(this));
            });



            /*
            *   关于category_s的操作
            * */
            $("#category_s-table tbody tr").each(function () {
                var id=$(this).attr("name");
                console.log(id);
                //点击edit按钮时
                $(this).find("button[name='edit']").click(function () {
                    $(this).hide();
                    $(this).parent().find("button[name='check']").show();
                    var category_id = $(this).parent().parent().find("td[name='category_id']").children("p").html();
                    console.log(category_id);

                    $(this).parent().parent().find("td[name='category_id']").empty();
                    var category_id_input = "<input type='text'class='form-control round-form' value="+ category_id +" placeholder="+ category_id + ">";
                    $(this).parent().parent().find("td[name='category_id']").append(category_id_input);

                    var category_name = $(this).parent().parent().find("td[name='category_name']").children("p").html();
                    var category_name_input = "<input type='text'class='form-control round-form' value="+ category_name + " placeholder="+ category_name + ">";
                    $(this).parent().parent().find("td[name='category_name']").empty();
                    $(this).parent().parent().find("td[name='category_name']").append(category_name_input);


                })
                //点击check按钮时
                $(this).find("button[name='check']").click(function () {
                    console.log("BBB");
                    $(this).hide();
                    $(this).parent().find("button[name='edit']").show();
                    var id = $(this).parent().parent().attr('name');
                    var category_id = $(this).parent().parent().find("td[name='category_id']").children("input").val();
                    var category_name = $(this).parent().parent().find("td[name='category_name']").children("input").val();
                    function ajaxcategorytable(id,category_id,category_name,_this) {
                        $.ajax({
                            type: "GET",
                            url: "category/ajaxcategory_stable",
                            data:  {'id':id ,'category_id':category_id , 'category_name':category_name},
                            success: function (data) {
                                console.log(data);
                                var category_id_input = "<p>"+ data['category_id']+"</p>";
                                console.log(category_id_input);
                                $(_this).parent().parent().find("td[name='category_id']").empty();
                                $(_this).parent().parent().find("td[name='category_id']").append(category_id_input);

                                var category_name_input = "<p>"+ data['category_name']+"</p>";
                                $(_this).parent().parent().find("td[name='category_name']").empty();
                                $(_this).parent().parent().find("td[name='category_name']").append(category_name_input);
                            }
                        });
                    }
                    javascript:ajaxcategorytable(id,category_id,category_name,$(this));
                })

                //点击delete按钮时
                $(this).find("button[name='delete']").click(function () {
                    var id = $(this).parent().parent().attr('name');
                    console.log(id);
                    function ajaxdeletecategory(id,_this){
                        $.ajax({
                            type: "GET",
                            url: "category/ajaxdeletecategory_s",
                            data:  {'id':id },
                            success: function (data) {
                                console.log(data);
                                $(_this).parent().parent().remove();
                            }
                        });
                    }
                    javascript:ajaxdeletecategory(id,$(this));
                })

            });

            //添加新的category_s
            $("#addcategory_sbutton").click(function () {
                var category_id = $("#addcatgory_sform").find("input#category_s_id").val();
                var category_name = $("#addcatgory_sform").find("input#category_s_name").val();
                var b_id = $("#addcatgory_sform").find("input#b_id").val();
                $(this).parent().parent().find("#addcatgory_sform input#category_s_id").attr("value","");
                $(this).parent().parent().find("#addcatgory_sform input#category_s_name").attr("value","");
                function ajaxaddcategory(category_id,category_name,b_id,_this) {
                    $.ajax({
                        type: "GET",
                        url: "category/ajaxaddcategory_s",
                        data:  {'category_id':category_id , 'category_name':category_name , 'b_id':b_id },
                        success: function (data) {
                            console.log(data);
                            var category_s_add_goods_url = window.location.host + "/goods/category/" + data['category_s'].b_id + "/category_s/"+ data['category_s'].category_id;
                            var category_s_add_html = "<tr name="+data['category_s'].id+">" +
                                    "<td name='category_id'><p>"+ data['category_s'].category_id +"</p> </td>" +
                                    "<td class='hidden-phone' name='category_name'><p>"+ data['category_s'].name +"</p></td>" +
                                    "<td name='b_id'>"+ data['category_s'].b_id+ "</td>" +
                                    "<td>"+ data['upper_class_name'] +"</td>"+
                                    "<td>number</td>" +
                                    "<td><span  class='label label-info label-mini'><a style='color:white' href="+ category_s_add_goods_url +">查看货物</a></span></td>" +
                                    "<td name='operate'>" +
                                    "<button class='btn btn-success btn-xs' name='check' style='display: none'><i class='fa fa-check'></i></button>"+
                                    "<button class='btn btn-primary btn-xs' name='edit'><i class='fa fa-pencil'></i></button>"+
                                    "<button class='btn btn-danger btn-xs' name='delete'><i class='fa fa-trash-o '></i></button>" +
                                    "</td>" +
                                    "</tr>";
                            $("#category_s-table tbody").append(category_s_add_html);


                        }
                    });
                }
                javascript:ajaxaddcategory(category_id,category_name,b_id,$(this));
            });
        });
    </script>
@endsection