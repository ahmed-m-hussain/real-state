<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city',
        'address',
        'room',
        'size',
        'detail',
        'price',
        'bathroom',
        'type',
        'cover_image',
        'garden',
        'sauna',
        'gym',
        'longitude',
        'latitude',
        'created_at',
        'updated_at',
    ];


    public function images()
    {
        return $this->hasMany('App\Image', 'home_id','id');
    }
    public function icons()
    {
        return $this->hasMany('App\Icon', 'home_id','id');
    }
}
