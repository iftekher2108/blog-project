<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = service::all();
        return view('home',compact('services'));
    }

    public function profileSetting() {
        return view('auth.profile');
    }





    // tiny mce file image upload manager
    public function tiny_mce_upload(Request $request) {
        $fileName=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('editor_uploads', $fileName, 'public');
        return response()->json(['location'=>"/storage/$path"]); 
        
        /*$imgpath = request()->file('file')->store('uploads', 'public'); 
        return response()->json(['location' => "/storage/$imgpath"]);*/
    }
    // tiny mce file image upload manager



}
