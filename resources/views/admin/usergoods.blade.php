@extends('layouts.base')
@section('content')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i>{{$username}}'s UserGoods List</h3>
            <div class="row mt">
                <div class="col-lg-12">

                </div>
            </div>


            <div class="row">
                <div class="col-lg-9 main-chart">
                    @foreach($goodss as $key =>$goods)
                        @if($key % 3 == 0)
                            <div class="row @if($key %3 == 0) mt @endif">
                        @endif
                                <!-- SERVER STATUS PANELS -->
                                <div class="col-md-4 @if($key % 3 != 2) col-sm-4 @endif  mb">
                                    <div class="white-panel pn">
                                        <div class="white-header">
                                            <h5>{{$goods->name}}</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6 goleft">
                                                <p><i class="fa fa-comments"></i>122</p>
                                            </div>
                                            <div class="col-sm-6 col-xs-6"></div>
                                        </div>
                                        <div class="centered">
                                            <img src="{{$imgs[$key]?:url("assets/img/product.png")}}" width="120">
                                        </div>
                                        <p>这里的资源位置类似于: http://mall.twt.edu.cn/twtmall2016/Uploads/goods/20160729/579b42e7644d4.jpg {{$imgs[$key]?"有":"无"}}</p>
                                    </div>
                                    created at: {{$goods->time}}
                                    <a href={{url("goods/$goods->id/detail")}}>check This Goods</a>
                                </div><!-- /col-md-4-->
                        @if($key % 3 == 2)
                        </div>
                        @endif




                    @endforeach
                </div>
            </div>
            {!! $goodss->render() !!}
            <div>

            </div>
        </section>
    </section>
@endsection