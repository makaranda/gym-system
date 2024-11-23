<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleTypes extends Model
{
    use HasFactory;
    protected $table = 'vehicle_types';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'status',
        'icon',
        'map_icon',
        'perkm_charge',
    ];
}
