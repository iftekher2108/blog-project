<?php

namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\service;
use App\Models\slider;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = slider::where('status','publish')->orderBy('order_id','asc')->get();
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
        $categories= category::with('news')->get();
        return view('front-end.news.news',compact('categories'));
    }

    public function contact() {
        return view('front-end.contact');
    }

    public function careers() {
        return view('front-end.privacy-policy');
    }


    public function privacy_policy() {
        return view('front-end.privacy-policy');
    }


    // public function pages($slug) {
    //     $page = pages::where('slug',$slug)->first();
    //     return view('front-end.pages',compact('page'));
    // }



}
