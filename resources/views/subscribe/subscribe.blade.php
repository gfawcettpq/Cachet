@extends('layout.master')

@section('description', trans('cachet.meta.description.subscribe', ['app' => $siteTitle]))

@section('content')

@include('partials.errors')

<div class="row">
  <div class="col-xs-12 col-lg-offset-2 col-lg-8">
    <div class="panel panel-default">
      <div class="panel-heading">Subscribe to receive updates</div>

      <div class="panel-body">
        <form class="form-horizontal" action="{{ cachet_route('subscribe', [], 'post') }}" method="POST" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
            <label class="control-label col-sm-2" for="subscriberEmail">Email</label>
            <div class="col-sm-10">
              <input class="form-control" type="email" id="subscriberEmail" name="email" placeholder="you@example.com">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <button type="submit" class="btn btn-success">{{ trans('cachet.subscriber.button') }}</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop

@section('bottom-content')
@include('partials.footer')
@stop
