<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SlotType extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'hourly_rate',
    ];

    /**
     * Slots
     *
     * @return HasMany
     */
    public function slots(): HasMany
    {
        return $this->hasMany(Slot::class);
    }

    /**
     * Vehicle Types compatible to this slot
     *
     * @return BelongsToMany
     */
    public function vehicleTypes(): BelongsToMany
    {
        return $this->belongsToMany(VehicleType::class);
    }
}
