<?php

namespace App\Http\Controllers;

// use App\Models\menu;
// use App\Models\subMenu;

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
        $sliders = Settings::where('data_name','home_slider')->orderBy('order_id','asc')->get();
        $services = service::where('status','publish')->take(4)->get();
        return view('front-end.index',compact('sliders','services'));
    }

    public function gallery() {
        return view('front-end.gallery');
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

    /**
     * Show the form for creating a new resource.
     */

    //  public function generatePage($id) {
    //     $menus = menu::where('status','publish')->find($id);
    //     // dd($menus);
    //      return view('front-end.generatePage',compact('menus'));
    //  }



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
