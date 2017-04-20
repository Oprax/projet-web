<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name', 'date', 'lieu', 'like', 'is_proposal', 'is_accept', 'can_subscribe', 'photo', 'description', 'association_id'
    ];

    protected $dates = [
        'date', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'is_proposal' => 'boolean',
        'is_accept' => 'boolean',
        'can_subscribe' => 'boolean',
        'like' => 'integer'
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

    public function getCommentsAttribute() {
        return Comment::where('commentable_type', 'Activity')
            ->where('commentable_id', $this->id)->get();
    }

    public function getLikesAttribute() {
        return Like::where('likable_type', 'Activity')
            ->where('likable_id', $this->id)->get();
    }

    public function getSubscribesAttribute() {
        return Subscribe::where('activity_id', $this->id)->get();
    }

    static function accepted() {
        return self::where('is_accept', true);
    }

    static function proposal() {
        return self::where('is_proposal', true);
    }
}
