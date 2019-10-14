<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page_title_en',
        'text_title_en',
        'description_en',
        'page_title_it',
        'text_title_it',
        'description_it',
        'page_title_de',
        'text_title_de',
        'description_de',
        'created_at',
        'updated_at',
    ];

    public function points()
    {
        return $this->hasMany('App\Point', 'administration_id','id');
    }
}
