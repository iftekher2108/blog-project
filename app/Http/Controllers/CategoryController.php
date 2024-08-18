<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::all();
        return view('back-end.news.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back-end.news.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new category;

        $request->validate([
            'picture' => 'nullable|image|mimes:png,jpg|max:10000',
            'title' => 'required|string',
            'status' => 'required'
        ]);

        $driver = new ImageManager(new Driver());

        if (isset($request->picture)) {

             $dir_path = 'category/';
             $file_name = 'category' . time() . '.' . $request->picture->extension();

             $store = $request->picture->storeAs($dir_path, $file_name, 'public');

             if ($store) {
                 $image = $driver->read('storage/category/' . $file_name);
                 $image->resize(400, 300);
                 $image->save('storage/' . $dir_path . $file_name);
             }

             $category->cat_picture = $file_name;
             $category->cat_title = $request->title;
             $category->cat_slug = Str::of($request->title)->slug('-');
             $category->status = $request->status;
             $category->save();
             return redirect()->route('category.index')->with('category', 'Item has been created');

         }

    }

    /**
     * Display the specified resource.
     */
    public function show(category $catagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $catagory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $catagory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $catagory)
    {
        //
    }
}
