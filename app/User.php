<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','forename', 'avatar', 'email', 'password', 'birthday', 'status_id', 'role_id', 'is_valid'
    ];

    protected $dates = [
        'birthday', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'is_valid' => 'boolean'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isCesi() {
        return $this->role->name === 'cesi';
    }

    public function isBDE() {
        return $this->role->name === 'BDE';
    }

    public function isCesiBDE(){
        return $this->isCesi() or $this->isBDE();
    }

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function status() {
        return $this->belongsTo('App\Status');
    }

    public function association() {
        return $this->belongsTo('App\Association');
    }

    public function photos() {
        return $this->hasMany('App\Photo');
    }

    public function subscribes() {
        return $this->hasMany('App\Subscribe');
    }

    public function soundings() {
        return $this->hasMany('App\Sounding');
    }

    public function comments_product() {
        return $this->hasMany('App\Model\Shop\shop_comments');
    }
}
