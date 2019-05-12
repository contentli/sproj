<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Category extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'categories';

    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'parent_id' => 'integer',
        'options' => 'array'
    ];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name',
        'description',
        'parent_id'
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
     * Get the products associated with the category.
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'category_id');
    }

    /**
     * Get the template associated with the category.
     */
    public function template()
    {
        return $this->hasOne('App\Template');
    }

    /**
     * Get the parent category associated with the category.
     */
    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    /**
     * Get the parent category associated with the category.
     */
    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    /**
    * Return a meu.
    *
    * @return array
    */
    public static function buildMenu($data, $parent = null)
    {
        $res ='';

        foreach ($data as $e) {
            if ($e['parent_id'] == $parent || ($parent == null && $e['parent_id'] == 0)) {
                //Also search for 0 when parent is null as are both the roots

                $res .= '<li><a href="'.route('category.show', $e['slug']).'">'.$e['name'].'</a>';

                $sub = self::buildMenu($data, $e['id']);

                if ($sub) {
                    $res .= '<ul>'.$sub.'</ul>';
                }


                $res .= '</li>';
            }
        }

        return $res;
    }
}
