@extends('layouts.base')
@section('content')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> </h3>
            <div class="row mt">
                <div class="col-lg-12">

                </div>
            </div>

            <div class="row mt">
                <!-- SERVER STATUS PANELS -->
                <div class="col-md-4 col-sm-4 mb">
                    <div class="white-panel pn donut-chart">
                        <div class="white-header">
                            <h5>SERVER LOAD</h5>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-6 goleft">
                                <p><i class="fa fa-database"></i> 70%</p>
                            </div>
                        </div>
                        <canvas id="serverstatus01" height="120" width="120"></canvas>
                        <script>
                            var doughnutData = [
                                {
                                    value: 70,
                                    color:"#68dff0"
                                },
                                {
                                    value : 30,
                                    color : "#fdfdfd"
                                }
                            ];
                            var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                        </script>
                    </div><! --/grey-panel -->
                </div><!-- /col-md-4-->


                <div class="col-md-4 col-sm-4 mb">
                    <div class="white-panel pn">
                        <div class="white-header">
                            <h5>TOP PRODUCT</h5>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-6 goleft">
                                <p><i class="fa fa-heart"></i> 122</p>
                            </div>
                            <div class="col-sm-6 col-xs-6"></div>
                        </div>
                        <div class="centered">
                            <img src="assets/img/product.png" width="120">
                        </div>
                    </div>
                </div><!-- /col-md-4 -->

                <div class="col-md-4 mb">
                    <!-- WHITE PANEL - TOP USER -->
                    <div class="white-panel pn">
                        <div class="white-header">
                            <h5>TOP USER</h5>
                        </div>
                        <p><img src="assets/img/ui-zac.jpg" class="img-circle" width="80"></p>
                        <p><b>Zac Snider</b></p>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="small mt">MEMBER SINCE</p>
                                <p>2012</p>
                            </div>
                            <div class="col-md-6">
                                <p class="small mt">TOTAL SPEND</p>
                                <p>$ 47,60</p>
                            </div>
                        </div>
                    </div>
                </div><!-- /col-md-4 -->


            </div><!-- /row -->

            <h2>右边放头像</h2>
            @foreach($goodss as $goods)
                <p>{{$goods->id}} : : {{$goods->name}} : : {{$goods->detail}}</p>
            @endforeach

            {!! $goodss->render() !!}}
            <div>

            </div>

            <p>needs</p>
            <p>trades</p>
            <p>collections</p>
            <p>comments</p>
        </section>
    </section>
@endsection