<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use DB;
use Auth;
class ArticlesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::orderBy('created_at','desc')->paginate(10);
       //$articles=DB::select('SELECT * FROM articles');
       return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
        return  view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $this->validate($request,[
        'type'=>'required',
        'rooms'=>'required',
        'area'=>'required',
        'location'=>'required',
        'price'=>'required',
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
            'user_id'=>Auth::user()->id,
            'type'=>$request->type,
            'rooms'=>$request->rooms,
            'area'=>$request->area,
            'location'=>$request->location,
            'price'=>$request->price,
            'cover_image'=>$filenameToStore,
            'state'=>$req
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
