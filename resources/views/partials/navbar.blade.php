<div class="navbar navbar-inverse">
  <div class="navbar-header">
    <button class="navbar-toggle" data-target="#example-navbar-2" data-toggle="collapse" type="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <ul class="nav navbar-nav">
      <li><a class="navbar-brand diagonal" href="/"><img alt="" src="" style="width:24px; height:24px;"></a></li>
      <li>
        <div class="navbar-brand product-name">
          <div class="pq-logo"></div>
          <a href="/">Status Page</a></div>
      </li>
    </ul>
  </div>

  <nav class="collapse navbar-collapse bs-navbar-collapse" id="main-menu" role="navigation">
    <div class="nav navbar-nav navbar-below">
      <ul class="nav navbar-nav">
        @if($enableSubscribers && Route::currentRouteNamed('core::get:status-page'))
        <li>
          <a class="btn btn-link" href="{{ cachet_route('subscribe') }}" shape="rect" title="Subscribe">{{ trans('cachet.subscriber.button') }}</a>
        </li>
        @endif
        @if(Route::currentRouteNamed('core::get:subscribe') || Route::currentRouteNamed('core::get:incident'))
        <li>
          <a class="btn btn-link" href="/" shape="rect" title="">Status Page</a>
        </li>
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a class="btn btn-link" href="{{ cachet_route('feed.rss') }}" shape="rect" title="RSS">{{ trans('cachet.rss-feed') }}</a>
        </li>
        <li>
          <a class="btn btn-link" href="{{ cachet_route('feed.atom') }}" shape="rect" title="Atom">{{ trans('cachet.atom-feed') }}</a>
        </li>
        @if($currentUser)
        <li>
          <a class="btn btn-link" href="{{ cachet_route('dashboard') }}">{{ trans('Settings') }}</a>
        </li>
        @endif
        @if($currentUser)
        <li>
          <a class="btn btn-link" href="{{ cachet_route('auth.logout') }}">{{ trans('dashboard.logout') }}</a>
        </li>
        @endif
      </ul>
    </div>
  </nav>
</div>

