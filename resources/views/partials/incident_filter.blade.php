<form class="form-inline" novalidate="" role="form" action="{{ cachet_route('incidents', [], 'post') }}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="row">
    <div class="form-group col-sm-12 col-md-12 col-lg-12">
      <label class="sr-only">Component</label>
      <div class="select-wrapper form-control">
        <select id="componentName" name="componentName" placeholder="Select Component">
          @if(!isset($componentName))
          <option value="" disabled selected>Select a component</option>
          @endif
          @foreach($components as $component)
          <option @if($componentName == $component->name)selected="selected"@endif >{{ $component->name }}</option>
          @endforeach
        </select>
      </div>
      <label class="sr-only">From Date</label>
      <div class="input-group">
        <span class="input-group-addon" id="fromDate">From</span>
        <input name="end_date" aria-describedby="fromDate" class="flatpickr" data-date-format="Y-m-d" placeholder="From Date" value="{{ $endDate }}" />
      </div>
      <label class="sr-only">To Date</label>
      <div class="input-group">
        <span class="input-group-addon" id="toDate">To</span>
        <input name="start_date" class="flatpickr" data-date-format="Y-m-d" placeholder="To Date" value="{{ $startDate }}" />
      </div>
      <button class="btn btn-primary" type="submit">Filter</button>
      <a class="btn btn-secondary" href="{{ cachet_route('incidents', [], 'get') }}">Clear</a>
    </div>
  </div>
</form>
