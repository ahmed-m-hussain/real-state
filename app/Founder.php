<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Founder extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'about_id',
        'first_name',
        'last_name',

        'expert_info_en',
        'specialty_en',
        'position_en',

        'expert_info_it',
        'specialty_it',
        'position_it',

        'specialty_de',
        'position_de',
        'expert_info_de',
        'avatar'
    ];
}
