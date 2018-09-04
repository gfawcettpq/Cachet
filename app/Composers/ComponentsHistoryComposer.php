<?php

/*
 * Custom Component History Composer
 *
 * (c) ProQuest LLC
 *
 */

namespace CachetHQ\Cachet\Composers;

use CachetHQ\Cachet\Models\Component;
use CachetHQ\Cachet\Models\ComponentGroup;
use CachetHQ\Cachet\Models\ComponentHistory;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\View\View;

/**
 * This is the components history composer
 *
 * @author Graeme Fawcett <graeme.fawcett@proquest.com>
 */
class ComponentsHistoryComposer
{
  /*
   * The user session object
   *
   * @var \Illuminate\Contracts\Auth\Guard
   */
  protected $guard;

  /**
   * Creates a new component history composer instance
   *
   * @param \Illuminate\Contracts\Auth\Guard $guard
   *
   * @return void
   */
  public function __construct(Guard $guard)
  {
    $this->guard = $guard;
  }

  /**
   * Bind data to the view
   *
   * @param \Illuminate\Contracts\View\View $view
   *
   * @return void
   */
  public function compose(View $view)
  {
    $component = $view->getFactory()->shared('component');
  }

  /**
   * Returns the details of the worst status reported for a given component/day
   *
   */
  protected function getComponentStatus(Component $component, String $day)
  {
    $status = DB::table('component_histories')
      ->where('component_id', $component->id)
      ->whereDate('created_at', $day)
      ->max('new_status');

    return $status;
  }
}
