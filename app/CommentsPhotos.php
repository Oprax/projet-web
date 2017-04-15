<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentsPhotos extends Model
{
    protected $fillable = [
        'content'
    ];

    public function photo() {
        return $this->belongsTo('App\Photo');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
