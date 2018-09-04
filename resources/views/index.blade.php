@extends('layout.master')

@section('content')
@include('partials.modules.messages')
@include('partials.modules.status')
@include('partials.modules.stickied')
@include('partials.modules.scheduled')
@include('partials.modules.components')
@include('partials.modules.history')
@stop

@section('bottom-content')
@include('partials.footer')
@stop
