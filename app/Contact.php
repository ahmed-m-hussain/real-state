<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city',
        'country',
        'address',
        'email',
        'phone',
        'created_at',
        'updated_at',
    ];
}
