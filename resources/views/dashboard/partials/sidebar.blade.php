<div class="sidebar">
    <div class="sidebar-inner">
        <div class="profile">
            <a href="{{ cachet_route('dashboard.user') }}">
                <span class="avatar"><img src="{{ $currentUser->avatar }}"></span>
            </a>
            <a href="{{ cachet_route('dashboard.user') }}">
                <h4 class="username">{{ $currentUser->username }}</h4>
            </a>
        </div>
        <div class="clearfix"></div>
        <div class="quick-add-incident">
            <a class="btn btn-block btn-info" href="{{ cachet_route('dashboard.incidents.create') }}">
                <i class="uxf-iconf uxf-check visible-sm"></i>
                <span class="hidden-sm">{{ trans('dashboard.incidents.add.title') }}</span>
            </a>
        </div>
        <ul>
            <li {!! set_active('dashboard') !!}>
                <a href="{{ cachet_route('dashboard') }}">
                    <i class="uxf-icon uxf-guage"></i>
                    <span>{{ trans('dashboard.dashboard') }}</span>
                </a>
            </li>
            <li {!! set_active('dashboard/incidents*') !!}>
                <a href="{{ cachet_route('dashboard.incidents') }}">
                    <i class="uxf-icon uxf-info"></i>
                    <span>{{ trans('dashboard.incidents.incidents') }}</span>
                    <span class="label label-info">{{ $incidentCount }}</span>
                </a>
            </li>
            <li {!! set_active('dashboard/templates*') !!}>
                <a href="{{ cachet_route('dashboard.templates') }}">
                    <i class="uxf-icon uxf-doc"></i>
                    <span>{{ trans('dashboard.incidents.incident-templates') }}</span>
                    <span class="label label-info">{{ $incidentTemplateCount }}</span>
                </a>
            </li>
            <li {!! set_active('dashboard/schedule*') !!}>
                <a href="{{ cachet_route('dashboard.schedule') }}">
                    <i class="uxf-icon uxf-cal"></i>
                    <span>{{ trans('dashboard.schedule.schedule') }}</span>
                    <span class="label label-info">{{ $scheduleCount }}</span>
                </a>
            </li>
            <li {!! set_active('dashboard/components*') !!}>
                <a href="{{ cachet_route('dashboard.components') }}">
                    <i class="uxf-icon uxf-grid-small"></i>
                    <span>{{ trans('dashboard.components.components') }}</span>
                    <span class="label label-info">{{ $componentCount }}</span>
                </a>
            </li>
            <li {!! set_active('dashboard/metrics*') !!}>
                <a href="{{ cachet_route('dashboard.metrics') }}">
                    <i class="uxf-icon uxf-chart-pie"></i>
                    <span>{{ trans('dashboard.metrics.metrics') }}</span>
                </a>
            </li>
            <li {!! set_active('dashboard/subscribers*') !!}>
                <a href="{{ cachet_route('dashboard.subscribers') }}">
                    <i class="uxf-icon uxf-mail"></i>
                    <span>{{ trans('dashboard.subscribers.subscribers') }}</span>
                    <span class="label label-info">{{ $subscriberCount }}</span>
                </a>
            </li>
            <li {!! set_active('dashboard/team*') !!}>
                <a href="{{ cachet_route('dashboard.team') }}">
                    <i class="uxf-icon uxf-users"></i>
                    <span>{{ trans('dashboard.team.team') }}</span>
                </a>
            </li>
            <li {!! set_active('dashboard/settings*') !!}>
                <a href="{{ cachet_route('dashboard.settings.setup') }}">
                    <i class="uxf-icon uxf-settings"></i>
                    <span>
                        {{ trans('dashboard.settings.settings') }}
                    </span>
                </a>
            </li>
            <li class="hidden-lg hidden-md">
                <a href="{{ cachet_route('auth.logout') }}">
                    <i class="uxf-icon uxf-logout"></i>
                </a>
            </li>
        </ul>
        <div class="bottom-menu-sidebar">
            <ul>
                <li data-toggle="tooltip" data-placement="top" title="{{ trans('dashboard.help') }}">
                    <a href="https://docs.cachethq.io" target="_blank"><i class="uxf-icon uxf-help-buoy"></i></a>
                </li>
                <li data-toggle="tooltip" data-placement="top" title="{{ trans('dashboard.status_page') }}">
                    <a href="{{ cachet_route('status-page') }}"><i class="uxf-icon uxf-monitor"></i></a>
                </li>
                <li data-toggle="tooltip" data-placement="top" title="{{ trans('dashboard.logout') }}">
                    <a href="{{ cachet_route('auth.logout') }}"><i class="uxf-icon uxf-logout"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
