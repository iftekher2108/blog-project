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


}
