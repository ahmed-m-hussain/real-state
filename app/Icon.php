<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'home_id',
        'name',
        'font',
        'created_at',
        'updated_at',
    ];
}
