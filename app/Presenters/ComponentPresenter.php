<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Presenters;

use CachetHQ\Cachet\Presenters\Traits\TimestampsTrait;
use CachetHQ\Cachet\Services\Dates\DateFactory;
use CachetHQ\Cachet\Models\ComponentHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Log;
use McCool\LaravelAutoPresenter\BasePresenter;

class ComponentPresenter extends BasePresenter implements Arrayable
{
    use TimestampsTrait;

    /**
     * Returns the override class name for theming.
     *
     * @return string
     */
    public function status_color()
    {
        switch ($this->wrappedObject->status) {
            case 0: return 'greys';
            case 1: return 'greens';
            case 2: return 'blues';
            case 3: return 'yellows';
            case 4: return 'reds';
        }
    }

    /**
     * Returns a collection of histories
     *
     */
    public function display_histories()
    {
      $m = date("m");
      $de = date("d");
      $y = date("Y");

      $histories = array();

      for ($i=0; $i<7; $i++) {
        $date = date(mktime(0, 0, 0, $m, ($de - $i), $y));

        $component = $this;

        $status = $this->history()
          ->whereDate('created_at', '=', date('Y-m-d', $date))
          ->max('new_status');

        // set status to operational of no status change found
        $status = isset($status) ? $status : 1;

        switch($status) {
        case 1:
          $icon = 'uxf-thumbs-up';
          $status = 'all-clear';
          $tooltip = 'No Incidents Reported';
          break;
        case 2:
          $icon = 'uxf-thumbs-down';
          $status = 'minor-incident';
          $tooltip = 'Performance Issues Reported';
          break;
        case 3:
          $icon = 'uxf-attention';
          $status = 'minor-incident';
          $tooltip = 'Partial Outage Reported';
          break;
        case 4:
          $icon = 'uxf-close';
          $status = 'major-incident';
          $tooltip = 'Major Outage Reported';
          break;
        }

        $histories[] = array(
          "icon" => $icon,
          "status" => $status,
          "tooltip" => $tooltip,
          "date" => date('Y-m-d', $date),
          "componentName" => $component->name
        );
      }

      return $histories;
    }

    /**
     * Looks up the human readable version of the status.
     *
     * @return string
     */
    public function human_status()
    {
        return trans('cachet.components.status.'.$this->wrappedObject->status);
    }

    /**
     * Find all tag names for the component names.
     *
     * @return array
     */
    public function tags()
    {
        return $this->wrappedObject->tags->pluck('tag.name', 'tag.slug');
    }

    /**
     * Present formatted date time.
     *
     * @return string
     */
    public function updated_at_formatted()
    {
        return ucfirst(app(DateFactory::class)->make($this->wrappedObject->updated_at)->format($this->incidentDateFormat()));
    }

    /**
     * Convert the presenter instance to an array.
     *
     * @return string[]
     */
    public function toArray()
    {
        return array_merge($this->wrappedObject->toArray(), [
            'created_at'  => $this->created_at(),
            'updated_at'  => $this->updated_at(),
            'status_name' => $this->human_status(),
            'tags'        => $this->tags(),
        ]);
    }
}
