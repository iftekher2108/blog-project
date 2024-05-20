<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use App\Models\service\ServiceCatagory;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;

class ServiceCatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function CreateCatagory()
    {
        return view('back-end.service.createCategory');
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
    public function StoreCatagory(Request $request)
    {
        Validator::make($request->all(),[
            'title' => 'nullable|string',
            'picture' => 'max:10000|mimes:png,jpg,jpeg|nullable',
            'status' => 'required'

        ]);

        $slider = new ServiceCatagory;
        $driver = new ImageManager(new Driver());

        if(isset($request->picture)) {

            $dir_path = 'service/catagory/';
            $file_name = 'serviceCatagory'.time().'.'.$request->picture->extension();

           $store = $request->picture->storeAs($dir_path , $file_name , 'public');

           if($store) {
            $image = $driver->read('storage/service/catagory/'. $file_name);
            $image->resize(400,300);
            $image->save('storage/'.$dir_path.$file_name);
           }

            $slider->picture = $file_name;

        }

        $slider->title = $request->title;
        $slider->status = $request->status;
        $slider->save();
        return redirect()->route('service.index')->with('success','Service Catagory created successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceCatagory $serviceCatagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceCatagory $serviceCatagory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceCatagory $serviceCatagory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceCatagory $serviceCatagory)
    {
        //
    }
}
