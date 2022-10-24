<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }

    public function video(){
        return $this->hasMany('App\Models\Video');
    }

    public function getName(){
        return $this->user->name;
    }

    public function getSpotName(){
        return $this->spot_name;
    }

    public function getImage(){
        return $this->comment->value('pic_content');
    }

}
