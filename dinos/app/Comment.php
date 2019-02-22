<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
      'user_id', 'post_id', 'content'
    ];

    public function post(){
        return $this->belongsTo('App\Post');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function replies(){
        return $this->hasMany('App\CommentReply');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
