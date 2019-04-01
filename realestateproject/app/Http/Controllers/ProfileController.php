<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\article;

class ProfileController extends Controller
{
    public function profile($username)
    {	
    	$user=User::wherename($username)->first();
        $article=article::where([
       'user_id'=>$user->id,])->get();
        

        return view('user.profile',compact('user'))->with('articles',$article);
    }
	public function editeprofile()
    {   
        $user=Auth::user();
        return view('user.editeprofile',compact('user'));
    }

    public function updateprofile(Request $request )
    {   
        
         $user=Auth::user();
         $user->update($request->all());
         return redirect()->route('profile', ['username' => $user->name]);
    }
}
