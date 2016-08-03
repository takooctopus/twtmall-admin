<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TWTMALL ADMIN MANAGER">
    <meta name="author" content="takooctopus">
    <meta name="keyword" content="TWT, TWTMALL, Admin">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>TWTMALL-ADMIN</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet">

    <script src={{asset("assets/js/chart-master/Chart.js")}}></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('styles')
</head>

<body>
<section id="container" >
    @yield('module')
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src={{asset("assets/js/jquery.js")}}></script>
<script src={{asset("assets/js/jquery-1.8.3.min.js")}}></script>
<script src={{asset("assets/js/bootstrap.min.js")}}></script>
<script class="include" type="text/javascript" src={{asset("assets/js/jquery.dcjqaccordion.2.7.js")}}></script>
<script src={{asset("assets/js/jquery.scrollTo.min.js")}}></script>
<script src={{asset("assets/js/jquery.nicescroll.js")}} type="text/javascript"></script>
<script src={{asset("assets/js/jquery.sparkline.js")}}></script>


<!--common script for all pages-->
<script src={{asset("assets/js/common-scripts.js")}}></script>

<script type="text/javascript" src={{asset("assets/js/gritter/js/jquery.gritter.js")}}></script>
<script type="text/javascript" src={{asset("assets/js/gritter-conf.js")}}></script>

<!--script for this page-->

@yield('scripts')
</body>
</html>