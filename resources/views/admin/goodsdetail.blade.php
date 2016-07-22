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
                    <p>name: {{$goods->name}}</p>
                    <p>belong: {{$goods->uid}} -:- <a href={{url("/user/$goodsUser->username/detail")}}>{{$goodsUser->username}}</a></p>
                    <p>category: {{$goods->category}} {{$goodsCategory->name}} -:- category_s: {{$goods->category_s}} {{$goodsCategory_s->name}}</p>
                    <p>detail:{{$goods->detail}}</p>
                    <p>campus: {{$goods->campus}}</p>
                    <p>location: {{$goods->location}}</p>
                    <p>price: {{$goods->price}} RMB</p>
                    <p>bargain: {{$goods->bargain}}</p>
                    <p>status: {{$goods->status}}% <button type="button" class="btn btn-round btn-default">status</button></p>
                    <p>exchange: {{$goods->exchange}}</p>
                    <p>phone: {{$goods->phone}}</p>
                    <p>wechat: {{$goods->wechat}}</p>
                    <p>qq: {{$goods->qq}}</p>
                    <p>time: {{$goods->time}}</p>
                    <p>view: {{$goods->view}} times</p>
                    <p>show: {{$goods->show}} 有没有图？</p>
                    <p>want: {{$goods->want}} 想要以物换物?</p>
                </div>
            </div>
            <div class="showback">
                <h4><i class="fa fa-angle-right"></i> 上架进度 </h4>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <span class="sr-only">45% Complete</span>
                    </div>
                </div>
            </div><!-- /showback -->

            <div>
                <a href="#">下架</a>
            </div>


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