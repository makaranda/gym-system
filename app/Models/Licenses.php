<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licenses extends Model
{
    use HasFactory;
    protected $table = 'licenses';
    protected $fillable = [
        'name',
        'user_id',
        'license_type',
        'registered_date',
        'expired_date',
        'license_front_img',
        'license_back_img',
        'status',
    ];

    // Relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
