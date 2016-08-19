@extends('layouts.base')
@section('content')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> Goods</h3>
            <div class="row mt">
                <div class="col-lg-12">
                    <p>View All Goods.</p>
                    <p id="goodss-count-describe">There are << {{$goodssCount}} >> goods!!!! </p>
                </div>
            </div>
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="col-lg-offset-8">
                        {{--Search Form!!!!!--}}
                        <form class="form-horizontal" id="searchForm" action="#">
                            <div class="form-group">
                                <label for="firstname" class="col-md-1 control-label"><i class="fa fa-search"></i> </label>
                                <div class="col-md-10">
                                    <input type="text" id="searchinfo" class="form-control" placeholder="name">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9 main-chart" id="goods-field">
                    @include('admin.goods.goodsfield')
                </div>
            </div>

            <div>

            </div>
        </section>
    </section>
    @if ($style == 'category')
        <p id="category_id" style="display: none">{{$category_id}}</p>
        <p id="category_s_id" style="display: none">{{$category_s_id}}</p>
    @endif
@endsection
@section('scripts')
    @if ($style == 'category')
        @include('admin.goods.categoryscript')
    @endif
    @if ($style == 'index')
        @include('admin.goods.indexscript')
    @endif

@endsection