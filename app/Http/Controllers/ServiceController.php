<?php

namespace App\Http\Controllers;

use App\Models\service;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use App\Models\service\ServiceCatagory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function service()
    {
        $services_catagories = ServiceCatagory::all();
        $services = service::all();
        return view('back-end.service.index', compact('services', 'services_catagories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function serviceCreate()
    {
        $services_catagories = ServiceCatagory::all();
        return view('back-end.service.create', compact('services_catagories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function serviceStore(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'nullable|string',
            'service_cat_id' => 'required',
            'picture' => 'max:10000|mimes:png,jpg,jpeg|nullable',
            'short_description' => 'required',
            'status' => 'required'

        ]);

        $service = new service;
        $driver = new ImageManager(new Driver());

        if (isset($request->picture)) {

            $dir_path = 'service/';
            $file_name = 'service' . time() . '.' . $request->picture->extension();

            $store = $request->picture->storeAs($dir_path, $file_name, 'public');

            if ($store) {
                $image = $driver->read('storage/service/' . $file_name);
                $image->resize(400, 300);
                $image->save('storage/' . $dir_path . $file_name);
            }

            $service->picture = $file_name;
        }

        $service->service_cat_id = $request->service_cat_id;
        $service->title = $request->title;
        $service->short_description = $request->short_description;
        $service->status = $request->status;
        $service->save();
        return redirect()->route('service.index')->with('success', 'Service created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function ServiceDelete($id)
    {
        $service = service::find($id);
        Storage::delete('public/service/' . $service->picture);
        $service->delete();
        return redirect()->route('service.index')->with('error', 'Menu Item Deleted Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(service $service)
    {
        //
    }
}
