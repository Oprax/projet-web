<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'likable_type', 'likable_id', 'user_id'
    ];

    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
