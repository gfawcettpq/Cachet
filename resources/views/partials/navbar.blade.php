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
        <li>
          <a class="btn btn-link" href="/" shape="rect" title="">Status Page</a>
        </li>
        <li>
          <a class="btn btn-link" href="{{ cachet_route('incidents') }}" shape="rect" title="Incidents">Incidents</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if($enableSubscribers)
        <li>
          <a class="btn btn-link" href="{{ cachet_route('subscribe') }}" shape="rect" title="Subscribe">{{ trans('cachet.subscriber.button') }}</a>
        </li>
        @endif
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

