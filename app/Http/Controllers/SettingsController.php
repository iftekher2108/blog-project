<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingsController extends Controller
{

    public function slider() {
        $sliders = Settings::where('data_name','home_slider')->get();
        return view('back-end.slider.index',compact('sliders'));
    }

    public function slider_order(Request $request) {
        $sliders = Settings::where('data_name','home_slider')->get();

        foreach ($sliders as $slider) {
            foreach ($request->orders as $order) {
                if($order['id'] == $slider->id) {
                    $slider->order_id = $order['position'];
                    $slider->save();
                }
            }
        }

        return response()->json(['success' => 'Slider order changed successfully']);

    }

    public function slider_create() {
        return view('back-end.slider.create');
    }

    public function slider_store(Request $request) {



        Validator::make($request->all(),[
            'data_name' => 'required|string',
            'title' => 'nullable|string',
            'sub_title' => 'nullable|string',
            'link' => 'nullable|string',
            'picture' => 'max:10000|mimes:png,jpg,jpeg',
            'status' => 'required'

        ]);

        $slider = new Settings;
        $driver = new ImageManager(new Driver());
        $slider->data_name = 'home_slider';

        if(isset($request->picture)) {

            $dir_path = 'slider/';
            $file_name = 'slider'.time().'.'.$request->picture->extension();

           $store = $request->picture->storeAs($dir_path , $file_name , 'public');

           if($store) {
            $image = $driver->read('storage/slider/'. $file_name);
            $image->resize(1920,1080);
            $image->save('storage/'.$dir_path.$file_name);
           }


            $slider->picture = $file_name;

        }

        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->link = $request->link;
        $slider->status = $request->status;
        $slider->save();

        return redirect()->route('slider.index')->with('success','Slider created successfully');

    }
// ---------------- slider end section ----------------------------



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
