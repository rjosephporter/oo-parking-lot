<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'vehicle_type_id',
        'plate_number',
    ];

    /**
     * Vehicle Type
     *
     * @return BelongsTo
     */
    public function vehicleType(): BelongsTo
    {
        return $this->belongsTo(VehicleType::class)->withTrashed();
    }
}
