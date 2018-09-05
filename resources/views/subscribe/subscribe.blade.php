@extends('layout.master')

@section('description', trans('cachet.meta.description.subscribe', ['app' => $siteTitle]))

@section('content')

@include('partials.errors')

<div class="row">
    <div class="col-xs-12 col-lg-offset-2 col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">Subscribe to receive updates</div>

            <div class="panel-body">
                <form class="form-horizonal" action="{{ cachet_route('subscribe', [], 'post') }}" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                      <label class="col-xs-12 col-lg-2 control-label" for="subscriberEmail">Email</label>

                      <div class="col-xs-12 col-lg-8">
                        <input class="form-control" type="email" id="subscriberEmail" name="email" placeholder="you@example.com">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-xs-12 col-lg-2">

                        <button type="submit" class="btn btn-success">{{ trans('cachet.subscriber.button') }}</button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
