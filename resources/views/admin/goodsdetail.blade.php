@extends('layouts.base')
@section('styles')
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href={{asset("assets/css/bootstrap-image-gallery.min.css")}}>
@endsection

@section('content')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> Goods Detail</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <p><i class="fa fa-info"></i>name: {{$goods->name}}</p>
                    <p><i class="fa fa-user"></i>belong: {{$goods->uid}} -:- <a href={{url("/user/$goodsUser->username/detail")}}>{{$goodsUser->username}}</a></p>
                    <p><i class="fa fa-calendar-o"></i>category: {{$goods->category}} {{$goodsCategory->name}} -:- category_s: {{$goods->category_s}} {{$goodsCategory_s->name}}</p>
                    <p><i class="fa fa-book"></i>detail:{{$goods->detail}}</p>
                    <p><i class="fa fa-building"></i>campus: {{$goods->campus == 1?"i=①卫津路校区":"②北洋园校区"}}</p>
                    <p><i class="fa fa-location-arrow"></i>location: {{$goods->location}}</p>
                    <p><i class="fa fa-rmb"></i>price: {{$goods->price}} RMB</p>
                    <p><i class="fa fa-ra"></i>bargain: {{$goods->bargain}}</p>
                    <p><i class="fa fa-dropbox"></i>status: {{$goods->status}}% <button type="button" class="btn btn-round btn-default">status</button></p>
                    <p><i class="fa fa-exchange"></i>exchange: {{$goods->exchange}}</p>
                    <p><i class="fa fa-phone"></i>phone: {{$goods->phone}}</p>
                    <p><i class="fa fa-wechat"></i>wechat: {{$goods->wechat}}</p>
                    <p><i class="fa fa-qq"></i>qq: {{$goods->qq}}</p>
                    <p><i class="fa fa-clock-o"></i>time: {{$goods->time}}</p>
                    <p><i class="fa fa-search"></i>view: {{$goods->view}} times</p>
                    <p><i class="fa fa-photo"></i>show: {{$goods->show}} 有没有图？</p>
                    <p><i class="fa fa-tag"></i>want: {{$goods->want}} 想要以物换物?</p>
                </div>
            </div>
            <div class="showback">
                <h4><i class="fa fa-angle-right"></i> 销售时间 :  {{$diffInDays}} Days / 180 Days</h4>
                <div class="progress progress-striped active">
                    <div class='progress-bar {{$progress<80?($progress<60?($progress<40?($progress<20?"progress-bar-success":"progress-bar-striped"):"progress-bar-info"):"progress-bar-warning"):"progress-bar-danger"}}'  role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: {{$progress}}%">
                        <span class="sr-only">{{$progress}}% Complete</span>
                    </div>
                </div>
                <a href="#">下架</a>
            </div><!-- /showback -->


            <div id="links">
                <a href={{url("assets/img/blog-bg.jpg")}} title="Banana" data-gallery>
                    <img src={{url("assets/img/blog-bg.jpg")}} alt="Banana">
                </a>
                <a href={{url("assets/img/login-bg.jpg")}} title="Apple" data-gallery>
                </a>
                <a href={{url("assets/img/instagram.jpg")}} title="Orange" data-gallery>
                </a>
            </div>

            <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
            <div id="blueimp-gallery" class="blueimp-gallery">
                <!-- The container for the modal slides -->
                <div class="slides"></div>
                <!-- Controls for the borderless lightbox -->
                <h3 class="title"></h3>
                <a class="prev">‹</a>
                <a class="next">›</a>
                <a class="close">×</a>
                <a class="play-pause"></a>
                <ol class="indicator"></ol>
                <!-- The modal dialog, which will be used to wrap the lightbox content -->
                <div class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body next"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left prev">
                                    <i class="glyphicon glyphicon-chevron-left"></i>
                                    Previous
                                </button>
                                <button type="button" class="btn btn-primary next">
                                    Next
                                    <i class="glyphicon glyphicon-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </section>
@endsection

@section('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <script src={{asset("assets/js/bootstrap-image-gallery.min.js")}}></script>
@endsection