<h4>{{ formatted_date($date) }}</h4>
@foreach($incidents as $incident)
<ul class="list-group components">
  <li class="list-group-item group-name">
    <span class="label label-default">{{ $incident->name }}</span>
    <strong> {{ $incident->component->name }}</strong>
  </li>
  <div class="group items">
    <div class="panel-body markdown-body">
      <div>
        <strong>Summary</strong>
      </div>
      {!! $incident->formatted_message !!}
      <br>
      @if(sizeof($incident->updates) == 0)
      <strong>No Updates Reported</strong>
      @else
      <strong>Updates</strong>
      <hr>
      <table class="table table-striped table-hover">
        <thead>
          <th>Status</th>
          <th>When</th>
          <th>Update</th>
        </thead>
        <tbody>
          @foreach($incident->updates as $update)
          <tr>
            <td><strong>{{ $update->human_status }}</strong></td>
            <td><small>{{ $update->timestamp_formatted }}</small></td>
            <td>{!! $update->formatted_message !!}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endif
    </div>
  </div>
</ul>
@endforeach
