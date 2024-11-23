<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    public $timestamps = false;
    protected $fillable = [
        'title',
        'user_id',
        'driver_id',
        'distance',
        'total_amount',
        'status',
    ];

    // Relationship with User (as the trip owner)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with Driver (as the driver of the trip)
    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
