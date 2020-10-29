<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    public $timestamps = true;

    public function videos()
    {
        return $this->belongsToMany(Video::class, 'tags_videos', 'tag_id', 'video_id');
    }
}
