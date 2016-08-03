@extends('layouts.base')
@section('styles')
    <link rel="stylesheet" type="text/css" href={{asset("assets/lineicons/style.css")}}>
    <link href={{asset("assets/css/style-responsive.css")}} rel="stylesheet">


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
                                    <h5>LATEST PRODUCT</h5>
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
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-1">
                                        <p class="small mt">Product ID</p>
                                        <p>56</p>
                                    </div>
                                    <div class="col-md-5">
                                        <p class="small mt">PRODUCT USER</p>
                                        <p> Takoyaki </p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /col-md-4 -->

                        <div class="col-md-4 mb">
                            <!-- WHITE PANEL - TOP USER -->
                            <div class="white-panel pn">
                                <div class="white-header">
                                    <h5>TOP USER</h5>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6 goleft">
                                        <p><i class="fa fa-hand-o-up"></i> 122</p>
                                    </div>
                                    <div class="col-sm-6 col-xs-6"></div>
                                </div>
                                <p><img src="assets/img/ui-zac.jpg" class="img-circle" width="80"></p>
                                <p><b>Zac Snider</b></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="small mt">User SINCE</p>
                                        <p>56</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="small mt">PRODUCT NUMBERS</p>
                                        <p> 55555 </p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /col-md-4 -->
                    </div><!-- /row -->

                    <div class="row">
                        <!-- TWITTER PANEL -->
                        <div class="col-md-4 mb">
                            <div class="darkblue-panel pn">
                                <div class="darkblue-header">
                                    <h5>DROPBOX STATICS</h5>
                                </div>
                                <canvas id="serverstatus02" height="120" width="120"></canvas>
                                <script>
                                    var doughnutData = [
                                        {
                                            value: 60,
                                            color:"#68dff0"
                                        },
                                        {
                                            value : 40,
                                            color : "#444c57"
                                        }
                                    ];
                                    var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                                </script>
                                <p>April 17, 2014</p>
                                <footer>
                                    <div class="pull-left">
                                        <h5><i class="fa fa-hdd-o"></i> 17 GB</h5>
                                    </div>
                                    <div class="pull-right">
                                        <h5>60% Used</h5>
                                    </div>
                                </footer>
                            </div><! -- /darkblue panel -->
                        </div><!-- /col-md-4 -->


                        <div class="col-md-4 mb">
                            <!-- INSTAGRAM PANEL -->
                            <div class="instagram-panel pn">
                                <i class="fa fa-instagram fa-4x"></i>
                                <p>@THISISYOU<br/>
                                    5 min. ago
                                </p>
                                <p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
                            </div>
                        </div><!-- /col-md-4 -->

                        <div class="col-md-4 col-sm-4 mb">
                            <!-- REVENUE PANEL -->
                            <div class="darkblue-panel pn">
                                <div class="darkblue-header">
                                    <h5>VISITOR NUMBERS</h5>
                                </div>
                                <div class="chart mt">
                                    <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,464,655]"></div>
                                </div>
                                <p class="mt"><b> 37420 </b><br/>  This Month </p>
                            </div>
                        </div><!-- /col-md-4 -->


                    </div><!-- /row -->



                </div>
            </div>




        </section>
    </section>
@endsection

@section('scripts')
    <script src={{asset("assets/js/chart-master/Chart.js")}}></script>
    <script src={{asset("assets/js/sparkline-chart.js")}}></script>


@endsection