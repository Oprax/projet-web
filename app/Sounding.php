<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sounding extends Model
{
    public $timestamps = false;

    public function activity() {
        return $this->belongsTo('App\Activity');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
