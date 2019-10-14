<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
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
    ];


    public function founders()
    {
        return $this->hasMany('App\Founder', 'about_id','id');
    }
}
