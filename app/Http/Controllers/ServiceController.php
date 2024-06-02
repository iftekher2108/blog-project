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
    // ========================= service list start =========================
    public function service()
    {
        $services_catagories = ServiceCatagory::all();
        $services = service::all();
        return view('back-end.service.index', compact('services', 'services_catagories'));
    }
    // ========================= service list end =========================


    // =============================== service create start =============================
    public function serviceCreate()
    {
        $services_catagories = ServiceCatagory::all();
        return view('back-end.service.create', compact('services_catagories'));
    }
    // =============================== service create end =============================

    // =============================== service store start =============================

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
    // =============================== service store end =============================



    // =============================== service order start ======================================
    public function service_order (Request $request) {
        $services = service::all();

        foreach ($services as $service) {
            foreach ($request->orders as $order) {
                if($order['id'] == $service->id) {
                    $service->order_id = $order['position'];
                    $service->save();
                }
            }
        }

        return response()->json(['success' => 'Service order changed successfully']);

    }
    // ========================================== service order end==================================


    // ========================================== service edit start ==========================
    public function serviceEdit($id)
    {
        $service = service::find($id);
        $services_catagories = $service->service_catagory->get();
        return view('back-end.service.edit',compact('service','services_catagories'));
    }
    // ========================================== service edit end ==========================


    // ======================================= service update start ======================================
    public function serviceUpdate(Request $request, $id)
    {
        $service = service::find($id);

        if(Storage::exists('public/service'.$service->picture)) {
            storage::delete('public/service'.$service->picture);
        }

        Validator::make($request->all(), [
            'title' => 'nullable|string',
            'service_cat_id' => 'required',
            'picture' => 'max:10000|mimes:png,jpg,jpeg|nullable',
            'short_description' => 'required',
            'status' => 'required'

        ]);

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
        return redirect()->route('service.index')->with('success', 'Service updated successfully');

    }
    // ======================================= service update end ====================================


    // ===================================== service delete start ====================================
    public function ServiceDelete($id)
    {
        $service = service::find($id);
        if(Storage::exists('public/service/'.$service->picture)) {
          Storage::delete('public/service/' . $service->picture);
        }
        $service->delete();
        return redirect()->route('service.index')->with('error', 'Service Deleted Successfully');
    }
    // ====================================== service delete end =================================

}
