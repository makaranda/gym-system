<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $fillable = [
        'user_type',
        'ratings',
        'user_id',
        'status',
    ];

    // Relationship with User (the user who is being rated)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
