<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model implements HasMedia
{
    use Searchable;
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
        'price' => 'string',
        'rating' => 'integer',
        'rating_count' => 'integer',
        'brand_id' => 'integer',
        'tag_id' => 'integer',
        'category_id' => 'integer',
        'published_at' => 'datetime',
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
        'blurb',
        'description',
        'price',
        'rating',
        'rating_count',
        'image',
        'specs',
        'links',
        'brand_id',
        'category_id',
        'tag_id',
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

    /**
    * Media collections and conversions.
    */
    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('product-images')
                ->registerMediaConversions(function (Media $media) {
                    $this
                        ->addMediaConversion('thumb')
                        ->crop('crop-center', 100, 100)
                        ->sharpen(10);

                    $this
                        ->addMediaConversion('medium')
                        ->crop('crop-center', 400, 250);

                    $this
                        ->addMediaConversion('large')
                        ->crop('crop-center', 800, 500);

                    $this
                        ->addMediaConversion('product')
                        ->crop('crop-center', 800, 800);
                });
    }

    /**
     * Check if product is published.
     *
     * @return boolean
     */
    public function isPublished()
    {
        if (is_null($this->published_at)) {
            return false;
        }
        return ($this->published_at->isBefore(now())) ? true : false;
    }

    /**
     * Should model be searchable?
     */

    public function shouldBeSearchable()
    {
        return $this->isPublished();
    }

    /**
     * Locally defined scopes
     */

     /**
     * Scope a query to only include published posts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRelated($query)
    {
        // First part gets all products of same category except itself
        $query = $query
            ->where('id', '!=', $this->id)
            ->where('category_id', '=', $this->category_id, 'and');

        // Count the result
        $count = $query->count();

        // If we have less then 4 results, include parent category if any
        if ($count <= 4 && $this->category->parent) {
            $parent_category = $this->category->parent;
            $query = $query
                ->where('category_id', '=', $parent_category->id, 'or');
        }

        // Return result, max 4 items
        return $query->take(4)->get();
    }

     /**
     * Scope a query to only include published posts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query
            ->where('published_at', '<=', now(), 'and')
            ->where('published_at', '!=', null);
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

    /**
    * Get the tag associated with the product.
    */
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }


}
