<form class="form-inline ng-untouched ng-pristine ng-valid" novalidate="" role="form" action="{{ cachet_route('incidents', [], 'post') }}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="select-wrapper form-control">
    <select id="componentName" name="componentName">
      @if(!isset($componentName))
      <option selected="selected">---</option>
      @endif
      @foreach($components as $component)
      <option @if($componentName == $component->name)selected="selected"@endif >{{ $component->name }}</option>
      @endforeach
    </select>
  </div>
  <button class="btn btn-default" type="submit">Filter</button>
</form>
