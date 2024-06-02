<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;

class SettingsController extends Controller
{
    //    =========================================== slider list start ===================================
    public function slider()
    {
        $sliders = Settings::where('data_name', 'home_slider')->get();
        return view('back-end.slider.index', compact('sliders'));
    }
    //    =========================================== slider list end ===================================

    //    =========================================== slider order start ===================================
    public function slider_order(Request $request)
    {
        $sliders = Settings::where('data_name', 'home_slider')->get();
        foreach ($sliders as $slider) {
            foreach ($request->orders as $order) {
                if ($order['id'] == $slider->id) {
                    $slider->order_id = $order['position'];
                    $slider->save();
                }
            }
        }
        return response()->json(['success' => 'Slider order changed successfully']);
    }
    //    =========================================== slider order end ===================================

    //    =========================================== slider create start ===================================
    public function slider_create()
    {
        return view('back-end.slider.create');
    }
    //    =========================================== slider create end ===================================

    //    =========================================== slider store start ===================================
    public function slider_store(Request $request)
    {
        Validator::make($request->all(), [
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
        if (isset($request->picture)) {
            $dir_path = 'slider/';
            $file_name = 'slider' . time() . '.' . $request->picture->extension();
            $store = $request->picture->storeAs($dir_path, $file_name, 'public');
            if ($store) {
                $image = $driver->read('storage/slider/' . $file_name);
                $image->resize(1280, 720);
                $image->save('storage/' . $dir_path . $file_name);
            }
            $slider->picture = $file_name;
        }
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->link = $request->link;
        $slider->status = $request->status;
        $slider->save();
        return redirect()->route('slider.index')->with('success', 'Slider created successfully');
    }
//    =========================================== slider store end ===================================

//    =========================================== slider edit start ===================================
    public function slider_edit($id) {
        $slider = Settings::find($id);
        return view('back-end.slider.edit',compact('slider'));
    }
 //    =========================================== slider edit end ===================================

  //    =========================================== slider update start ===================================
    public function slider_update(Request $request, $id)  {
        Validator::make($request->all(), [
            'data_name' => 'required|string',
            'title' => 'nullable|string',
            'sub_title' => 'nullable|string',
            'link' => 'nullable|string',
            'picture' => 'max:10000|mimes:png,jpg,jpeg|nullable',
            'status' => 'required'
        ]);
        $slider = Settings::where('data_name','home_slider')->find($id);
        if(Storage::exists('public/slider/'.$slider->picture)) {
            Storage::delete('public/slider/'.$slider->picture);
        }
        $driver = new ImageManager(new Driver());
        $slider->data_name = 'home_slider';
        if (isset($request->picture)) {
            $dir_path = 'slider/';
            $file_name = 'slider' . time() . '.' . $request->picture->extension();
            $store = $request->picture->storeAs($dir_path, $file_name, 'public');
            if ($store) {
                $image = $driver->read('storage/slider/' . $file_name);
                $image->resize(1280, 720);
                $image->save('storage/' . $dir_path . $file_name);
            }
            $slider->picture = $file_name;
        }
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->link = $request->link;
        $slider->status = $request->status;
        $slider->save();
        return redirect()->route('slider.index')->with('success', 'Slider updated successfully');
    }
 //    =========================================== slider update end ===================================

 //    =========================================== slider delete start ===================================
    public function slider_delete($id)
    {
        $slider = Settings::where('data_name','home_slider')->find($id);
        if(Storage::exists('public/slider/'.$slider->picture)) {
            Storage::delete('public/slider/'.$slider->picture);
        }
        $slider->delete();
        return redirect()->route('slider.index')->with('error','Slider deleted successfully');
    }
//    =========================================== slider delete end ===================================

}
