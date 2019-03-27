<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
     protected $dates = ['deleted_at'];


    public function getphotoAttribute($photo)
    {
        return asset($photo);
    }

    public function catogory()
    {
        return $this->belongsTo('App\Catogory');
    }

    public function tags()
    {
        return $this->belongsToMany('App\tag');
    }
}
