<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ArticleCategory extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title_en'
            ]
        ];
    }

     public function image(){
        return $this->belongsTo('App\Image','image_id');
    }

    public function article()
    {
        return $this->hasMany('App\Article','id');
    }
}
