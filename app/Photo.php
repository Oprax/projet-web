<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'path', 'like'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    protected $casts = [
        'like' => 'integer'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function activity() {
        return $this->belongsTo('App\Activity');
    }

    public function getCommentsAttribute() {
        return Comment::where('commentable_type', 'Photo')
            ->where('commentable_id', $this->id)->get();
    }

    public function getLikesAttribute() {
        return Like::where('likable_type', 'Photo')
            ->where('likable_id', $this->id)->get();
    }
}
