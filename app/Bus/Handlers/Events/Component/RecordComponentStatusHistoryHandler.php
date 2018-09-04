<?php

/*
 * This file is part of Cachet.
 *
 * (c) ProQuest LLC
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Bus\Handlers\Events\Component;

use CachetHQ\Cachet\Bus\Events\Component\ComponentStatusWasChangedEvent;
use CachetHQ\Cachet\Integrations\Contracts\System;
use CachetHQ\Cachet\Models\Component;
use CachetHQ\Cachet\Models\ComponentHistory;
use CachetHQ\Cachet\Notifications\Component\ComponentStatusChangedNotification;
use Illuminate\Support\Facades\Log;

class RecordComponentStatusHistoryHandler
{
    /**
     * The system instance.
     *
     * @var \CachetHQ\Cachet\Integrations\Contracts\System
     */
    protected $system;

    /**
     * The component history instance.
     *
     * @var \CachetHQ\Cachet\Models\ComponentHistory
     */
    protected $componentHistory;

    /**
     * Create a new send incident email notification handler.
     *
     * @return void
     */
    public function __construct(System $system)
    {
        $this->system = $system;
    }

    /**
     * Handle the event.
     *
     * @param \CachetHQ\Cachet\Bus\Events\Component\ComponentStatusWasChangedEvent $event
     *
     * @return void
     */
    public function handle(ComponentStatusWasChangedEvent $event)
    {
      Log::debug('running RecordComponentStatusHistoryHandler');

      $componentHistory = new ComponentHistory;

      $componentHistory->component_id = $event->component->id;
      $componentHistory->old_status = $event->original_status;
      $componentHistory->new_status = $event->new_status;

      $componentHistory->save();
    }
}

