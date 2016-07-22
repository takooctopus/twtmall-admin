@extends('layouts.base')
@section('styles')
    <link rel="stylesheet" type="text/css" href={{url("assets/lineicons/style.css")}}>
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-9 main-chart">
                    <div class="row mtbox">
                        <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                            <div class="box1">
                                <span class="li_user"></span>
                                <h3>933</h3>
                            </div>
                            <p><a href={{url("/user")}}>933 Users in your database. Whoohoo!</a></p>
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="li_lab"></span>
                                <h3>+48</h3>
                            </div>
                            <p><a href={{url("/goods")}}>48 New goods were added in your database.</a></p>
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="li_note"></span>
                                <h3>23</h3>
                            </div>
                            <p><a href="#">There have been XXX visites via 24 hours</a></p>
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="li_world"></span>
                                <h3>+10</h3>
                            </div>
                            <p><a href="#">More than 10 news were added in your reader.</a></p>
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="li_data"></span>
                                <h3>OK!</h3>
                            </div>
                            <p><a href="#">Your server is working perfectly. Relax & enjoy.</a></p>
                        </div>
                    </div><!-- /row mt -->

                    <div class="row mt">
                        <!-- SERVER STATUS PANELS -->
                        <div class="col-md-4 col-sm-4 mb">
                            <div class="white-panel pn donut-chart">
                                <div class="white-header">
                                    <h5>SERVER LOAD</h5>
                                </div>
                                <div class="col-lg-6">
                                    <div class="panel-body">
                                        <div id="hero-donut" class="graph"></div>
                                    </div>
                                </div>

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
                </div>
            </div>


        </section>
    </section>
@endsection

@section('scripts')
    <script src={{asset("http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js")}}></script>
@endsection