<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sociallink extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'icon', 'class', 'link',
    ];

}
