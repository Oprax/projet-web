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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isCesi() {
        return $this->role === 'cesi';
    }

    public function isBDE() {
        return $this->role === 'BDE';
    }

    public function isCesiBDE(){
        if($this->role === 'BDE') {
            return true;
        }
        elseif($this->role === 'cesi'){
            return true;
        }
        else{
            return false;
        }
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

    public function comments_activities() {
        return $this->hasMany('App\CommentsActivities');
    }

    public function comments_photos() {
        return $this->hasMany('App\CommentsPhotos');
    }

    public function comments_product() {
        return $this->hasMany('App\Model\Shop\shop_comments');
    }
}
