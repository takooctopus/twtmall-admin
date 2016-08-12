@extends('layouts.base')
@section('styles')
    <link  href={{asset("viewer-master/dist/viewer.css")}} rel="stylesheet">
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

            <div>
                <h3>Comments</h3>
                    @foreach($comments as $comment_key => $comment)
                        <p>{{$comment->username}} {{$comment->time}} {{$comment->content}}</p>
                        @foreach($replys[$comment_key] as $reply_key => $reply)
                            <p>{{$replyUsers[$comment_key][$reply_key]}} to {{$comment->username}} : {{$reply->time}} {{$reply->content}}</p>
                        @endforeach
                    @endforeach
            </div>


            <div id="photo">
                @foreach($imgs as $key => $img)
                    <img src={{$imgbaseurl . $img->url}} alt="" @if ($key != 0) style="display: none" @endif >
                @endforeach
            </div>


        </section>
    </section>

@endsection

@section('scripts')
    <!--common script for this pages-->
    <script src={{asset("viewer-master/dist/viewer.js")}}></script><!-- jQuery is required -->
    <script>
        $(document).ready(function(){
            $('#photo').viewer();
        });
    </script>
@endsection