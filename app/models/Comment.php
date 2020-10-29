<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['comments','user_id','video_id'];
    public $timestamps=true;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function video(){
        return $this->belongsTo(Video::class);
    }
}
