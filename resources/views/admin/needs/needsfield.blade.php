@foreach($needss as $key =>$needs)
    @if($key % 3 == 0)
        <div class="row @if($key %3 == 0) mt @endif">
        @endif
        <!-- SERVER STATUS PANELS -->
            <div class="col-md-4 @if($key % 3 != 2) col-sm-4 @endif  mb">
                <div class="white-panel pn">
                    <div class="white-header">
                        <h5>{{$needs->name}}</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-6 goleft">
                            <p><i class="fa fa-comments"></i>122 <i class="fa fa-user"></i>user <i class="fa fa-clock-o"></i>time </p>
                        </div>
                        <div class="col-sm-6 col-xs-6"></div>
                    </div>
                    <div class="centered">
                        <img src="{{url("assets/img/product.png")}}" width="120">
                    </div>
                </div>
                created at: {{$needs->time}}
                <a href={{url("needs/$needs->id/detail")}}>check This Needs</a>
            </div><!-- /col-md-4-->
            @if($key % 3 == 2)
        </div>
    @endif

@endforeach

{!! $needss->render() !!}