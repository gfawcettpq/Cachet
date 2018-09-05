@if($componentGroups->isNotEmpty())
@foreach($componentGroups as $componentGroup)
<ul class="list-group components">
  @if($componentGroup->enabled_components->isNotEmpty())
  <li class="list-group-item group-name">
    <strong>{{ $componentGroup->name }}</strong>
  </li>

  <div class="group items">
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col" class="col-md-5">Service</th>
            @foreach($dateColumnHeaders as $dateColumnHeader)
            <th scope="col" class="col-md-1">{{ $dateColumnHeader }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
        @foreach($componentGroup->enabled_components()->orderby('order')->get() as $component)
        @include('partials.component_history', ['component' => $component,])
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endif
</ul>
@endforeach
@endif
