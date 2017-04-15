<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'path', 'like'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function activity() {
        return $this->belongsTo('App\Activity');
    }

    public function comments_photos() {
        return $this->hasMany('App\CommentsPhotos');
    }
}
