@extends('layouts.base')
@section('styles')
    <link  href={{asset("viewer-master/dist/viewer.css")}} rel="stylesheet">
@endsection
@section('content')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i> Img</h3>
            <hr>
            @foreach($imgs as $key => $img)
                @if($key % 3 ==0 ) <div class="row mt"> @endif
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc" style="height: 100%;"  >
                        <div class="project-wrapper">
                            <div class="project">
                                <div class="photo-wrapper">
                                    <div class="photo" style="overflow: hidden">
                                        <img class="img-responsive" src="{{$imgbaseurl . $img->url}}" alt="">
                                    </div>
                                    <div class="overlay"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($key % 3 ==2 ) </div> @endif
            @endforeach

            {!! $imgs->render() !!}
        </section>
    </section><!-- /MAIN CONTENT -->

@endsection
@section('scripts')
    <script src={{asset("viewer-master/dist/viewer.js")}}></script><!-- jQuery is required -->
    <script>
        $(document).ready(function(){
            $('.photo').viewer();
        });
    </script>
@endsection