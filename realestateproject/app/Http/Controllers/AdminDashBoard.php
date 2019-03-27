<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\article;

class AdminDashBoard extends Controller
{
     public function showdashboard()
     {	
     	//remove the comment and add compact to the view function
     	//$article=article::where('state','=','requested')->get();
     	return view('admin.home');
     }
}
