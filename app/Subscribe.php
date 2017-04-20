<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $fillable = [
        'user_id', 'activity_id'
    ];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function activity() {
        return $this->belongsTo('App\Activity');
    }
}
