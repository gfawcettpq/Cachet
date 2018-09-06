@foreach($incidents as $incident)
<ul class="list-group components">
  <li class="list-group-item group-name">
    <span><strong>{{ $incident->component->name }}</strong></span>
    <span class="pull-right">{{ formatted_date($date) }}</span>
  </li>
  <div class="group items">
    <div class="panel-body markdown-body">
      <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6">
          <strong>Summary</strong>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
          <span class="pull-right"><h6>{{ $incident->name }}</h6></span>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
          {!! $incident->formatted_message !!}
        </div>
      </div>
      @if(sizeof($incident->updates) == 0)
      <hr />
      <strong>No Updates Reported</strong>
      @else
      <hr />
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col" class="col-md-1">Status</th>
            <th scope="col" class="col-md-2">When</th>
            <th scope="col" class="col-md-9">Update</th>
          </tr>
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
