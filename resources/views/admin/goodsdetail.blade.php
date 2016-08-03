@extends('layouts.base')
@section('styles')
    <link rel="stylesheet" href={{asset("/PhotoSwipe-master/dist/photoswipe.css")}}>
    <link rel="stylesheet" href={{asset("/PhotoSwipe-master/dist/default-skin/default-skin.css")}}>
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


        </section>
    </section>
    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe.
             It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides.
                PhotoSwipe keeps only 3 of them in the DOM to save memory.
                Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>
@endsection

@section('scripts')
    <!--common script for this pages-->
    <script src={{asset("/PhotoSwipe-master/dist/photoswipe.min.js")}}></script>
    <script src={{asset("/PhotoSwipe-master/dist/photoswipe-ui-default.min.js")}}></script>
@endsection