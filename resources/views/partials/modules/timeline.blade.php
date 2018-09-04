<div class="section-timeline">
    @include('partials.incident_filter', [$components])
    @foreach($allIncidents as $date => $incidents)
    @include('partials.incidents2', [compact($date), compact($incidents)])
    @endforeach
    @if (sizeof($allIncidents) == 0)
    <h3>{{ trans('cachet.incidents.none') }}</h3>
    @endif
</div>

<nav>
    <ul class="pager">
        @if($canPageBackward)
        <li class="previous">
            <a href="{{ cachet_route('incidents') }}?start_date={{ $previousDate }}&component_name={{ $componentName }}" class="links">
                <span aria-hidden="true">&larr;</span> {{ trans('pagination.previous') }}
            </a>
        </li>
        @endif
        @if($canPageForward)
        <li class="next">
            <a href="{{ cachet_route('incidents') }}?start_date={{ $nextDate }}&coponent_name={{ $componentName }}" class="links">
                {{ trans('pagination.next') }} <span aria-hidden="true">&rarr;</span>
            </a>
        </li>
        @endif
    </ul>
</nav>
