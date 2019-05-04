<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model implements HasMedia
{
    use Sluggable;
    use SluggableScopeHelpers;
    use SoftDeletes;
    use HasMediaTrait;

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
        'description',
        'rating',
        'image',
        'specs',
        'links',
        'brand_id',
        'category_id',
        'published_at'
    ];

    /**
    * Return the sluggable configuration array for this model.
    *
    * @return array
    */
    public function sluggable()
    {
        return [
            'slug' => ['source' => 'name']
        ];
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('product-images')
                ->registerMediaConversions(function (Media $media) {
                    $this
                        ->addMediaConversion('thumb')
                        ->crop('crop-center', 160, 100)
                        ->sharpen(10);

                    $this
                        ->addMediaConversion('medium')
                        ->crop('crop-center', 400, 250);

                    $this
                        ->addMediaConversion('large')
                        ->crop('crop-center', 800, 500);
                });
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
