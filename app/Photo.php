<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = [
        'user_id', 'photo', 'likes', 'caption'
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }
}
