<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = [
        'user_id',
        'driver_id',
        'distance',
        'other',
        'tax',
        'total_amount',
        'active',
        'status',
    ];

    // Relationship with User (the customer who made the payment)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with Driver (the driver related to the payment)
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
