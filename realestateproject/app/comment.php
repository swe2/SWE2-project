<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id','type','article_id','user_name','cover_image'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function article()
    {
    	return $this->belongsTo('App\Article');
    }
}