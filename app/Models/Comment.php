<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function spots(){
        return $this->belongsTo('App\Models\Spot');
    }

    public function getComment(){
        return $this->comment;
    }

    public function getName(){
        return $this->user->name;
    }

    public function getSpotName(){
        return $this->spots->spot_name;
    }

    public function getDateTime(){
        return $this->created_at;
    }
}
