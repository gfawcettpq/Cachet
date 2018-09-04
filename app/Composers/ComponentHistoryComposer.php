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
class ComponentHistoryComposer
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
    $componentGroups = $this->getVisibleGroupedComponents();
    $ungroupedComponents = Component::ungrouped()->get();

    $dateColumnHeaders = $this->getDateColumnHeaders();

    $view->withComponentGroups($componentGroups)
      ->withUngroupedComponents($ungroupedComponents)
      ->withDateColumnHeaders($dateColumnHeaders);
  }

  /**
   * Get visible grouped components
   *
   * @return \Illuminate\Support\Collection
   */
  protected function getVisibleGroupedComponents()
  {
    $componentGroupsBuilder = ComponentGroup::query();

    if ($this->guard->check()) {
      $componentGroupsBuilder->visible();
    }

    $usedComponentGroups = Component::grouped()->pluck('group_id');

    return $componentGroupsBuilder->used($usedComponentGroups)->get();
  }

  /**
   * Returns a list of the last 7 dates for the table headers
   *
   * @return array
   */
  protected function getDateColumnHeaders()
  {
    $m = date("m");
    $de = date("d");
    $y = date("Y");

    $dateArray = array();

    for ($i=0; $i<7; $i++) {
      $dateArray[] = date("M d", mktime(0,0,0,$m,($de-$i),$y));
    }

    return $dateArray;
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
