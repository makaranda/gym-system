<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'driver_id',
        'pick_up_location',
        'drop_off_location',
        'passengers',
        'vehicle_type',
        'pick_up_date',
        'pick_up_time',
        'active',
        'status'
    ];

    /**
     * Get the user that made the booking.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the driver for the booking.
     */
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }

    /**
     * Scope a query to only include active bookings.
     */
    public function scopeActive($query)
    {
        return $query->where('active', 'active');
    }

    /**
     * Scope a query to only include pending bookings.
     */
    public function scopePending($query)
    {
        return $query->where('active', 'pending');
    }

    /**
     * Scope a query to only include inactive bookings.
     */
    public function scopeInactive($query)
    {
        return $query->where('active', 'inactive');
    }
}
