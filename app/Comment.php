<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content', 'commentable_type', 'commentable_id'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
