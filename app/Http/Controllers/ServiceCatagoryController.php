<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use App\Models\service\ServiceCatagory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;

class ServiceCatagoryController extends Controller
{
    //    =========================================== service category create start ===================================

    // public function CreateCategory()
    // {
    //     return view('back-end.service.createCategory');
    // }
//    =========================================== service category create end ===================================



//    =========================================== service category store start ===================================

    // public function StoreCategory(Request $request)
    // {
    //     Validator::make($request->all(),[
    //         'title' => 'nullable|string',
    //         'picture' => 'max:10000|mimes:png,jpg,jpeg|nullable',
    //         'status' => 'required'

    //     ]);

    //     $service_category = new ServiceCatagory;
    //     $driver = new ImageManager(new Driver());

    //     if(isset($request->picture)) {

    //         $dir_path = 'service/category/';
    //         $file_name = 'serviceCategory'.time().'.'.$request->picture->extension();

    //        $store = $request->picture->storeAs($dir_path , $file_name , 'public');

    //        if($store) {
    //         $image = $driver->read('storage/service/category/'. $file_name);
    //         $image->resize(400,300);
    //         $image->save('storage/'.$dir_path.$file_name);
    //        }

    //         $service_category->picture = $file_name;

    //     }

    //     $service_category->title = $request->title;
    //     $service_category->status = $request->status;
    //     $service_category->save();
    //     return redirect()->route('service.index')->with('success','Service Category created successfully');

    // }
//    =========================================== service category store end ===================================



//    =========================================== service category edit start ===================================

    // public function serviceCategoryEdit($id)
    // {
    //     $service_category = ServiceCatagory::find($id);
    //     return view('back-end.service.editCategory',compact('service_category'));
    // }
//    =========================================== service category edit end ===================================



//    =========================================== service category update start ===================================

    // public function serviceCategoryUpdate(Request $request,$id)
    // {
    //     $service_category = ServiceCatagory::find($id);
    //     if(Storage::exists('public/service/category'.$service_category->picture)) {
    //         Storage::delete('public/service/category'.$service_category->picture);
    //     }

    //     Validator::make($request->all(),[
    //         'title' => 'required|string',
    //         'picture' => 'max:10000|mimes:png,jpg,jpeg|nullable',
    //         'status' => 'required'

    //     ]);

    //     $driver = new ImageManager(new Driver());

    //     if(isset($request->picture)) {

    //         $dir_path = 'service/category/';
    //         $file_name = 'serviceCategory'.time().'.'.$request->picture->extension();

    //        $store = $request->picture->storeAs($dir_path , $file_name , 'public');

    //        if($store) {
    //         $image = $driver->read('storage/service/category/'. $file_name);
    //         $image->resize(400,300);
    //         $image->save('storage/'.$dir_path.$file_name);
    //        }

    //         $service_category->picture = $file_name;

    //     }

    //     $service_category->title = $request->title;
    //     $service_category->status = $request->status;
    //     $service_category->save();
    //     return redirect()->route('service.index')->with('success','Service Category Updated successfully');

    // }
//    =========================================== service category update end ===================================


//    =========================================== service category delete start ===================================
    // public function serviceCategoryDelete($id)
    // {
    //     $service_category = ServiceCatagory::find($id);

    //     if(Storage::exists('public/service/category/' . $service_category->picture))
    //     {
    //         Storage::delete('public/service/category/' . $service_category->picture);
    //     }
    //     $service_category->delete();

    //     return redirect()->route('service.index')->with('error','Service Category Deleted successfully');
    // }
//    =========================================== service category delete start ===================================


}
