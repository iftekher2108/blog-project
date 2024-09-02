<?php

namespace App\Http\Controllers;

use App\Models\slider;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class SliderController extends Controller
{

    //    =========================================== slider list start ===================================
    public function slider()
    {
        $sliders = slider::all();
        return view('back-end.slider.index', compact('sliders'));
    }

    //    =========================================== slider list end ===================================

    //    =========================================== slider order start ===================================
    public function slider_order(Request $request)
    {
        $sliders = slider::get();
        foreach ($sliders as $slider) {
            foreach ($request->orders as $order) {
                if ($order['id'] == $slider->id) {
                    $slider->order_id = $order['position'];
                    $slider->save();
                }
            }
        }
        return response()->json(['success' => 'Items sort changed']);
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
        $request->validate([
            'title' => 'nullable|string',
            'sub_title' => 'nullable|string',
            'link' => 'nullable|string',
            'picture' => 'required|max:10000|mimes:png,jpg,jpeg',
            'status' => 'required'
        ]);

        $slider = new slider;
        $driver = new ImageManager(new Driver());
        if (isset($request->picture)) {
            $dir_path = 'slider/';
            $file_name = 'slider' . time() . '.' . $request->picture->extension();
            $store = $request->picture->storeAs($dir_path, $file_name, 'public');
            if ($store) {
                $image = $driver->read('storage/slider/' . $file_name);
                $image->resize(1920, 1080);
                $image->save('storage/' . $dir_path . $file_name);
            }
            $slider->picture = $file_name;
        }
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->link = $request->link;
        $slider->status = $request->status;
        $slider->save();
        return redirect()->route('slider.index')->with('success', 'Slider has been created');
    }
    //    =========================================== slider store end ===================================


    //    =========================================== slider edit start ===================================
    public function slider_edit($id)
    {
        $slider = slider::find($id);
        return view('back-end.slider.edit', compact('slider'));
    }
    //    =========================================== slider edit end ===================================


    //    =========================================== slider update start ===================================
    public function slider_update(Request $request, $id)
    {
       $request->validate([
            'title' => 'nullable|string',
            'sub_title' => 'nullable|string',
            'link' => 'nullable|string',
            'picture' => 'max:10000|mimes:png,jpg,jpeg|nullable',
            'status' => 'required'
        ]);

        $slider = slider::find($id);
        $driver = new ImageManager(new Driver());
        if (isset($request->picture)) {
            if (Storage::exists('public/slider/' . $slider->picture)) {
                Storage::delete('public/slider/' . $slider->picture);
            }
            $dir_path = 'slider/';
            $file_name = 'slider' . time() . '.' . $request->picture->extension();
            $store = $request->picture->storeAs($dir_path, $file_name, 'public');
            if ($store) {
                $image = $driver->read('storage/slider/' . $file_name);
                $image->resize(1920, 1080);
                $image->save('storage/' . $dir_path . $file_name);
            }
            $slider->picture = $file_name;
        }
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->link = $request->link;
        $slider->status = $request->status;
        $slider->save();
        return redirect()->route('slider.index')->with('success', 'Item has been updated');
    }
    //    =========================================== slider update end ===================================


    //    =========================================== slider delete start ===================================
    public function slider_delete($id)
    {
        $slider = slider::find($id);
        if (Storage::exists('public/slider/' . $slider->picture)) {
            Storage::delete('public/slider/' . $slider->picture);
        }
        $slider->delete();
        return redirect()->route('slider.index')->with('error', 'Item has been deleted');
    }
    //    =========================================== slider delete end ===================================



    //    =========================================== slider delete all end ===================================
    public function slider_delete_all(Request $request) {
        $sliders = slider::whereIn('id', $request->id);
        foreach ($sliders->get() as  $slider) {
            if (Storage::exists('public/slider/' . $slider->picture)) {
                Storage::delete('public/slider/' . $slider->picture);
            }
        }
        $sliders->delete();
        return response()->json(['error' => 'Items has been deleted']);
    }
    //    =========================================== slider delete all end ===================================


}
