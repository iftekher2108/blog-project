<?php

namespace App\Http\Controllers;

use App\Models\pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {

    //     return view('back-end.content.edit');
    // }








    /**
     * Store a newly created resource in storage.
     */
    // public function pageStore(Request $request)
    // {
    //     $validator = Validator::make($request->all(),[
    //         'title' => ['required','string','unique:pages,title'],
    //         'picture'=>['nullable','mimes:png,jpg','max:10000'],
    //         'slug' =>['required','string'],
    //         'menu_id' => ['required'],
    //         'sub_title' => ['nullable','string'],
    //         'description' => ['nullable','string'],
    //         'content' => ['nullable','string'],
    //         'keywords' => ['nullable','string'],
    //         'status' =>['required'],
    //     ]);

    //     $data = $validator->validated();

    //     if(isset($data['picture'])) {
    //         $dir_path = 'pages/future/';
    //         $file_name = 'feature'.time().'.'.$data['picture']->extension();
    //         $data['picture']->storeAs($dir_path,$file_name,'public');
    //         $data['picture'] = $dir_path . $file_name;
    //     }

    //     $data['slug'] =Str::of($data['title'])->slug();

    //     pages::create($data);

    //     return redirect()->route('page.index')->with('success','item has been created');

    // }

}
