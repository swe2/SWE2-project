<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
         'user_id' , 'type' , 'rooms' , 'area' , 'location' , 'price' , 'cover_image','state'
    ];


    public function getShortContentAttribute()
    {

    	return $this->type.'...';
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

}
