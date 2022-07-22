<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gate extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Parking slots with distance
     *
     * @return BelongsToMany
     */
    public function slots(): BelongsToMany
    {
        return $this->belongsToMany(Slot::class)
            ->using(GateSlot::class)
            ->withPivot('distance')
            ->withTimestamps();
    }
}
