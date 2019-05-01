<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Auth;
use App\article;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;








class AdminDashBoard extends Controller
{
     use RegistersUsers;
     protected $redirectTo = '/home';

      public function destroyarticle($id)
     {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('/admindashboard');
     }

    public function approvearticle(Request $request,$id)
     {
          $article = Article::findOrFail($id);
          
          $article->update($request->all());
          
     }

     public function showdashboard()
     {	
     	
     	$article=article::where('state','=','requested')->get();
     	return view('admin.home',compact('article'));
     }


     public function showadduser()
     { 
     	return view('admin.adduser');
     }


     protected function validator(array $data)
     {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'cover_image'=>'image|nullable|max:1999'
        ]);
     }

     protected function create(array $data)
     {
     
            
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'cover_image'=>$data['cover_image']
        ]);
     }


      public function showarticel()
    {
        return  view('admin.createarticle');
    }

  
    public function storearticle(Request $request)
    {   $this->validate($request,[
        'type'=>'required',
        'rooms'=>'required',
        'area'=>'required',
        'location'=>'required',
        'price'=>'required',
        'userid'=>'required',
        'cover_image'=>'image|nullable|max:1999'
    ]);
   

    //Handle File upload
    if($request->hasFile('cover_image')){
        //Get File Name with the extenssion
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        //get just filname
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //get just ext
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        //Filename to store
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        //upload image
        $path = $request->file('cover_image')->storeAs('public/cover_image',$filenameToStore);
    } else {
        $filenameToStore = 'noimage.jpg';
    }


        
        $req='requested';
        
       // Article::create($request->all());
        Article::create([
            'user_id'=>$request->userid,
            'type'=>$request->type,
            'rooms'=>$request->rooms,
            'area'=>$request->area,
            'location'=>$request->location,
            'price'=>$request->price,
            'cover_image'=>$filenameToStore,
            'state'=>$req
        ]);
        return redirect('/admindashboard');
    }
}
