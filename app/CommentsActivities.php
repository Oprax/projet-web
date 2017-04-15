<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentsActivities extends Model
{
    protected $fillable = [
        'content'
    ];

    public function activity() {
        return $this->belongsTo('App\Activity');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
