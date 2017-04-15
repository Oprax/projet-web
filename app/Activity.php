<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name', 'date', 'lieu', 'like', 'is_proposal', 'is_accept', 'can_subscribe', 'photo'
    ];

    public function association() {
        return $this->belongsTo('App\Association');
    }

    public function subscribes() {
        return $this->hasMany('App\Subscribe');
    }

    public function soundings() {
        return $this->hasMany('App\Sounding');
    }

    public function photos() {
        return $this->hasMany('App\Photo');
    }

    public function comments_activities() {
        return $this->hasMany('App\CommentsActivities');
    }

}
