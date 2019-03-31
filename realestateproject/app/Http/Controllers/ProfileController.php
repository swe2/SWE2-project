<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {	
    	return view('user.profile');
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
    }
}
