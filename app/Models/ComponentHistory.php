<?php

namespace CachetHQ\Cachet\Models;

use AltThree\Validator\ValidatingTrait;
use CachetHQ\Cachet\Models\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Model;
use McCool\LaravelAutoPresenter\HasPresenter;

class ComponentHistory extends Model implements HasPresenter
{
    use SortableTrait, ValidatingTrait;

    /**
     * The attributes that should be casted to native types.
     *
     * @var string[]
     */
    protected $casts = [
      'component_id' => 'int',
      'old_status'   => 'int',
      'new_status'   => 'int'
    ];

    /**
     * The fillable properties.
     *
     * @var string[]
     */
    protected $fillable = [
        'component_id',
        'old_status',
        'new_status'
    ];

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'component_id' => 'required|int',
        'old_status'   => 'required|int',
        'new_status'   => 'required|int'
    ];

    /**
     * The sortable fields.
     *
     * @var string[]
     */
    protected $sortable = [
        'id',
        'component_id'
    ];

    /**
     * Get the incident relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    /**
     * Find the history for a component
     *
     * @param int component_id
     *
     */
    public function forComponent($component_id)
    {
      return $this->where('component_id', $component_id);
    }

    /**
     * Find the history for a date
     *
     * @param string $date
     */
    public function forDate($date)
    {
      return $this->whereDate('created_at', $date);
    }

    /**
     * Get the presenter class.
     *
     * @return string
     */
    public function getPresenterClass()
    {
        return ComponentHistoryPresenter::class;
    }
    //
}
