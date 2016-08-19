@extends('layouts.base')
@section('content')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3> <img src={{$imgbaseurl . $imgurl}} class="img-circle" width="60"> <i class="fa fa-angle-right"></i>{{$user->username}}</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <p>There you can view user's info and goods</p>
                    <p><i class="fa fa-building"></i>  campus: <i class="fa fa-angle-left"></i> {{$user->campus}} <i class="fa fa-angle-right"></i> {{ $campus[$user->campus]}}</p>
                    <p><i class="fa fa-sort-numeric-asc"></i> stunumber:{{$user->stunumber}}</p>
                    <p><i class="fa fa-phone"></i> phone:{{$user->phone}}</p>
                    <p><i class="fa fa-wechat"></i> wechat:{{$user->wechat}}</p>
                    <p><i class="fa fa-qq"></i> qq:{{$user->qq}}</p>
                    <p><i class="fa fa-image"></i> imgurl:{{$user->imgurl}} <a href="{{$imgbaseurl . $imgurl}}">{{$imgbaseurl . $imgurl}}</a>  </p>
                    <p><i class="fa fa-mail-reply-all"></i>email:{{$user->email}}  <a href="/contact/mail/{{$user->email}}"> contact him</a> </p>
                    <p><i class="fa fa-heart"></i> praise:{{$user->praise}}</p>
                </div>
            </div>


            <div>
                <p>goods</p>
                <p>ammount:{{$goodsCount}}</p>
                <p>latest goods:</p>
                <p>name: {{$latestGoods->name}}  detail:{{$latestGoods->detail}}  category_id:{{$latestGoods->category_id}}  category_s_id:{{$latestGoods->category_s_id}}  campus:{{$latestGoods->campus}}  location:{{$latestGoods->location}}  price:{{$latestGoods->price}}</p>
                <a href="{{url("/user/$user->username/goods")}}">Check All Goods</a>
            </div>

            <div>
                <p>needs</p>
                <p>ammount:{{$goodsCount}}</p>
                <p>latest goods:</p>
                <p>name: {{$latestNeeds->name}}  detail:{{$latestNeeds->detail}}  category_id:{{$latestNeeds->category_id}}  category_s_id:{{$latestNeeds->category_s_id}}  campus:{{$latestNeeds->campus}}  location:{{$latestNeeds->location}}  price:{{$latestNeeds->price}}</p>
                <a href="{{url("/user/$user->username/needs")}}">Check All Needs</a>
            </div>
            <p>trades</p>
            <div>
                <p>collections</p>
                <a href="{{url("/user/$user->username/collection")}}">Check All Collection</a>
            </div>

            <p>comments</p>
        </section>
    </section>
@endsection