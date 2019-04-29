<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
use App\User;
use App\article;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
    	 $this->validate($request,[
        'type'=>'required'
    	]);

    	  Comment::create([
            'user_id'=>Auth::user()->id,
            'type'=>$request->type,
            'article_id'=>$request->article_id
        ]);
    }
}