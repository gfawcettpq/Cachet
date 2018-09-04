<tr>
  <td>{{ $component->name }}</td>
  @foreach($component->display_histories() as $history)
  <td>
    <a href="{{ cachet_route('incidents') }}?start_date={{  $history['date'] }}&end_date={{ $history['date'] }}&componentName={{ $history['componentName'] }}">
      <span aria-hidden="true" class="uxf-icon {{ $history['icon'] }} {{ $history['status'] }}" data-toggle="tooltip" data-title="{{ $history['tooltip'] }}"></span>
    </a>
  </td>
  @endforeach
</tr>
