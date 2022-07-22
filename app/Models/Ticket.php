<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'entry_gate_id',
        'exit_gate_id',
        'slot_id',
        'vehicle_id',
        'ticket_number',
        'entered_at',
        'left_at',
        'duration',
        'amount',
        'status',
    ];

    /**
     * Gate where the vehicle entered
     *
     * @return BelongsTo
     */
    public function entryGate(): BelongsTo
    {
        return $this->belongsTo(Gate::class);
    }

    /**
     * Gate where the vehicle exited
     *
     * @return BelongsTo
     */
    public function exitGate(): BelongsTo
    {
        return $this->belongsTo(Gate::class);
    }

    /**
     * Parking slot where the vehicle parked
     *
     * @return BelongsTo
     */
    public function slot(): BelongsTo
    {
        return $this->belongsTo(Slot::class);
    }

    /**
     * Vehicle who parked in the parking slot
     *
     * @return BelongsTo
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * Ticket Logs
     *
     * @return HasMany
     */
    public function ticketLogs(): HasMany
    {
        return $this->hasMany(TicketLog::class);
    }
}
