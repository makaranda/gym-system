<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservations';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'user_id',
        'driver_id',
        'pick_up_location',
        'drop_off_location',
        'distance',
        'total_amount',
        'active',
        'status',
    ];

    // Relationship with User (the customer making the reservation)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with Driver (the driver assigned to the reservation)
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
