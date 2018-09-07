<li class="list-group-item {{ $component->group_id ? "sub-component" : "component" }}">
    <div class="row">
      @if($component->link)
      <div class="col-xs-2">
        {{ $component->name }}
      </div>
      <div class="col-xs-1">
        <a href="{{ $component->link }}" class="btn btn-link" target="_blank">
          <i class="uxf-icon uxf-popup">
          </i>
        </a>
      </div>
      @else
      <div class="col-xs-3">
        {{ $component->name }}
      </div>
      @endif

    <div class="col-xs-9">
      <span class="pull-right">
        <small class="text-component-{{ $component->status }} {{ $component->status_color }}" data-toggle="tooltip" title="{{ trans('cachet.components.last_updated', ['timestamp' => $component->updated_at_formatted]) }}">{{ $component->human_status }}</small>
      </span>
    </div>
    </div>
</li>
