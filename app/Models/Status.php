<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'status';
    // Define the fillable or guarded properties if needed
    protected $fillable = [
        'user_id',
        'driver_id',
        'booking_id',
        'type',
        'role',
        'active',
        'status',
        'pick_up_date',
        'pick_up_time'
    ];
}
