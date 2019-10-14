<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesSection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'real_estate_appraisal_id',
        'name_en',
        'name_it',
        'name_de',
        'font',
        'created_at',
        'updated_at',
    ];
}
