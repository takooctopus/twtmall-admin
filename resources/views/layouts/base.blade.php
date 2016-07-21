@extends('layouts.layout')
@section('module')
    @include('layouts.header')
    @include('layouts.sidebar')
    @include('layouts.footer')
    @yield('content')
@endsection

