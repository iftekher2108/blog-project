<?php

namespace App\Http\Controllers\news;
use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::all();
        return view('back-end.news.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back-end.news.categories.create');
    }

    public function edit($id)
    {
        $category = category::find($id);
        return view('back-end.news.categories.edit', compact('category'));
    }


    //    =========================================== category create start ===================================

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
            return redirect()->route('category.index')->with('success', 'Item has been created');
        }
    }
    //    =========================================== category create end ===================================


    //    =========================================== category update start ===================================
    public function update(Request $request, $id)
    {
        $category = category::find($id);

        $request->validate([
            'title' => 'required'
        ]);

        $driver = new ImageManager(new Driver());

        if (isset($request->picture)) {
            if (Storage::exists('public/category' . $category->cat_picture)) {
                storage::delete('public/category' . $category->cat_picture);
            }
            $dir_path = 'category/';
            $file_name = 'category' . time() . '.' . $request->picture->extension();
            $store = $request->picture->storeAs($dir_path, $file_name, 'public');
            if ($store) {
                $image = $driver->read('storage/service/' . $file_name);
                $image->resize(400, 300);
                $image->save('storage/' . $dir_path . $file_name);
            }
            $category->cat_picture = $file_name;
        }

        $category->cat_title = $request->title;
        $category->cat_slug = Str::of($request->title)->slug('-');
        $category->status = $request->status;
        $category->save();
        return redirect()->route('category.index')->with('success', 'Item has been updated');
    }
    //    =========================================== category update end ===================================


    //    =========================================== category delete start ===================================
    public function delete($id)
    {
        $category = category::find($id);
        if (Storage::exists('public/category/' . $category->cat_picture)) {
            Storage::delete('public/category/' . $category->cat_picture);
        }
        $category->delete();
        return redirect()->route('category.index')->with('error', 'Item has been Deleted');
    }
    //    =========================================== category delete end ===================================


    //    =========================================== service delete all end ===================================
    public function category_delete_all(Request $request)
    {
        $categories = category::whereIn('id', $request->id);
        foreach ($categories->get() as  $category) {
            if (Storage::exists('public/category/' . $category->cat_picture)) {
                Storage::delete('public/category/' . $category->cat_picture);
            }
        }
        $categories->delete();
        return response()->json(['error' => 'Items has been deleted']);
    }
    //    =========================================== service delete all end ===================================







}
