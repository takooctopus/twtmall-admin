@extends('layouts.base')
@section('content')
    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                        @include('admin.partials.errors')
                        @include('admin.partials.success')
                        <h1> Contact \ Email </h1>
                        <p>
                            There You can contact to this User By email !!!!!

                            :)

                        </p>
                        <form action="{{url('/contact/mail')}}" method="post">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="row control-group">
                                <div class="form-group col-xs-12">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{$mail['name']}}" readonly="readonly">
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="{{$mail['email']}}" readonly="readonly">
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 controls">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                           value="{{$mail['phone']}}" readonly="readonly">
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 controls">
                                    <label for="message">Message</label>
              <textarea rows="5" class="form-control" id="message"
                        name="message">{{ old('message') }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-default">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection