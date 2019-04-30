<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Brand extends Model
{
    use Sluggable;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'brands';

    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string'
    ];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name',
        'description'
    ];

    /**
    * Return the sluggable configuration array for this model.
    *
    * @return array
    */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
