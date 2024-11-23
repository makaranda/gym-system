<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'title',
        'icon',
        'image',
        'description',
        'services',  // JSON field
        'brochure',
        'application',
        'status',
    ];

    public function getServicesAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Mutator for services (JSON field).
     *
     * @param  array  $value
     * @return void
     */
    public function setServicesAttribute($value)
    {
        $this->attributes['services'] = json_encode($value);
    }
}
