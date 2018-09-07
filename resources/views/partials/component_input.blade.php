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
          <strong>{{ $component->name }}</strong>
        </label>
        @if($component->description)
        &nbsp;[{{ $component->description }}]
        @endif
    </div>
</li>
