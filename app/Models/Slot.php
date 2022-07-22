<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slot extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'slot_type_id',
        'status',
    ];

    /**
     * Gates with distance
     *
     * @return BelongsToMany
     */
    public function gates(): BelongsToMany
    {
        return $this->belongsToMany(Gate::class)
            ->using(GateSlot::class)
            ->withPivot('distance')
            ->withTimestamps();
    }

    /**
     * Slot Type
     *
     * @return BelongsTo
     */
    public function slotType(): BelongsTo
    {
        return $this->belongsTo(SlotType::class);
    }
}
