@extends('layouts.base')
@section('content')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> {{$user->username}}</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <p>There you can view user's info and goods</p>
                    <p>campus:{{$user->campus}}</p>
                    <p>stunumber:{{$user->stunumber}}</p>
                    <p>phone:{{$user->phone}}</p>
                    <p>wechat:{{$user->wechat}}</p>
                    <p>qq:{{$user->qq}}</p>
                    <p>imgurl:{{$user->imgurl}}</p>
                    <p>email:{{$user->email}}</p>
                    <p>praise:{{$user->praise}}</p>
                </div>
            </div>
            <h2>右边放头像</h2>

            <div>
                <p>goods</p>
                <p>ammount:{{$goodsCount}}</p>
                <p>latest goods:</p>
                <p>name: {{$latestGoods->name}}  detail:{{$latestGoods->detail}}  category_id:{{$latestGoods->category_id}}  category_s_id:{{$latestGoods->category_s_id}}  campus:{{$latestGoods->campus}}  location:{{$latestGoods->location}}  price:{{$latestGoods->price}}</p>
                <a href="{{url("/user/$user->username/goods")}}">Check All Goods</a>
            </div>

            <p>needs</p>
            <p>trades</p>
            <p>collections</p>
            <p>comments</p>
        </section>
    </section>
@endsection