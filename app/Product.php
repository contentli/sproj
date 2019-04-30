<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Sluggable;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'rating' => 'integer',
        'brand_id' => 'integer',
        'category_id' => 'integer',
        'specs' => 'array',
        'options' => 'array',
        'links' => 'array'
    ];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'rating',
        'brand_id',
        'category_id'
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

    /**
     * All relationships.
     */

    /**
     * Get the brand associated with the product.
     */
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    /**
     * Get the category associated with the product.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }


}
