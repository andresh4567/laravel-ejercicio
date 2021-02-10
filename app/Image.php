<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model{
    protected $table = 'images';

    public function comments(){
        return $this->hasMany('App\Comments')->orderBy('id', 'desc');
    }

    public function likes(){
        return $this->hasMany('App\Likes');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
