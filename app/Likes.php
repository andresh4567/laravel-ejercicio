<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model{
    protected $table = 'Likes';

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function image(){
        return $this->belongsTo('App\Image', 'image_id');
    }
}
