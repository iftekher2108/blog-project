<?php

namespace App\Http\Controllers;

// use App\Models\menu;
// use App\Models\subMenu;

use App\Models\pages;
use App\Models\service;
use App\Models\Settings;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Settings::where('data_name','home_slider')->where('status','publish')->orderBy('order_id','asc')->get();
        $services = service::where('status','publish')->orderBy('order_id','asc')->take(4)->get();
        return view('front-end.index',compact('sliders','services'));
    }

    public function gallery() {
        return view('front-end.gallery');
    }

    public function services() {
        return view('front-end.service');
    }

    public function about() {
        return view('front-end.about');
    }

    public function news() {
        return view('front-end.news.news');
    }

    public function contact() {
        return view('front-end.contact');
    }


    public function pages($slug) {
        $page = pages::where('slug',$slug)->get();
        return view('front-end.pages',compact('page'));
    }

    

}
