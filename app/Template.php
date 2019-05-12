<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'templates';

    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'category_id' => 'integer',
        'content' => 'array'
    ];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'category_id',
        'content'
    ];

      /**
    * All relationships.
    */

    /**
    * Get the brand associated with the product.
    */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
