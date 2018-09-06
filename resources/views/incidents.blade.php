@extends('layout.master')

@section('content')
@include('partials.incident_filter', [$components])
@include('partials.modules.timeline')
@stop

@section('bottom-content')
@include('partials.footer')
@stop
