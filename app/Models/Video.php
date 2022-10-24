<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function spots(){
        return $this->belongsTo('App\Models\Spot');
    }

    public function getVideo(){
        return $this->video_content;
    }

    public function getName(){
        return $this->user->name;
    }

    public function getDateTime(){
        return $this->created_at;
    }
}
