<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingsController extends Controller
{

    // slider section
    public function slider() {
        $sliders = Settings::where('data_name','slider')->get();
        return view('back-end.slider.index',compact('sliders'));
    }

    public function slider_order(Request $request) {

    }

    public function slider_create() {
        return view('back-end.slider.create');
    }

    public function slider_store(Request $request) {

        $slider = new Settings;

        $request->validate([
            'data_name' => 'required|string',
            'title' => 'nullable|string',
            'sub_title' => 'nullable|string',

        ]);

        if(isset($request->picture)) {
            $driver = new ImageManager(new Driver());

        }

    }



    /**
     * Show the form for creating a new resource.
     */
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
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Settings $settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
