<li class="list-group-item {{ $component->group_id ? "sub-component" : "component" }}">
    <div class="checkbox">
        <label for="component-{{ $component->id }}">
            <input type="checkbox"
                     id="component-{{ $component->id }}"
                   name="subscriptions[]"
                  value="{{ $component->id }}"
            @if (in_array($component->id, $subscriptions) || $subscriber->global)
                checked="checked"
            @endif />
          {{ $component->name }}
        </label>
        @if($component->description)
        <span class="uxf-icon uxf-help help-icon" data-toggle="tooltip" data-title="{{ $component->description }}" data-container="body"></span>
        @endif
    </div>
</li>
