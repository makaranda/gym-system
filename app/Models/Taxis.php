<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxis extends Model
{
    use HasFactory;
    protected $table = 'taxis';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'title',
        'type',
        'doors',
        'passengers',
        'luggage_carry',
        'transmission',
        'year',
        'fuel_type',
        'air_condition',
        'gps',
        'engine',
        'registered_no',
        'image',
        'description',
        'status',
    ];
}
