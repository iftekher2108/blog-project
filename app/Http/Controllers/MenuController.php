<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class MenuController extends Controller
{

    public function menu()
    {
        $menus = Menu::orderBy('order_id', 'asc')->get();

        return view('back-end.menu.index', compact('menus'));
    }


    public function menu_order(Request $request)
    {

        $menus = Menu::all();

        foreach ($menus as $menu) {
            foreach ($request->orders as $order) {
                if ($order['id'] == $menu->id) {
                    $menu->order_id = $order['position'];
                    $menu->save();
                }
            }
        }

        return response()->json(['success' => 'Items sort changed']);
    }




    public function menu_edit($id)
    {
        $menu = Menu::find($id);
        return view('back-end.menu.edit', compact('menu'));
    }


    public function menu_update(Request $request,$id) {

        $menu = Menu::find($id);

        $request->validate([
            'title' => 'required|string',
        ]);

        $driver = new ImageManager(new Driver());
        if(isset($request->picture)) {
            $dir_path = 'menu/';
            $file_name = 'menu-'.time().'.'.$request->picture->extension();
            $store = $request->picture->storeAs($dir_path,$file_name,'public');
            if ($store) {
                $image = $driver->read('storage/menu/' . $file_name);
                $image->resize(1920, 1080);
                $image->save('storage/' . $dir_path . $file_name);
            }
            $menu->picture = $dir_path . $file_name;
        }

        $menu->title = $request->title;
        $menu->slug = $request->slug;
        $menu->content = $request->content;
        $menu->keyword = $request->keyword;
        $menu->status = $request->status;
        $menu->save();

        return redirect()->route('menu.index')->with('success',$menu->title.' Items has been updated');

    }




    // public function menu_store(Request $request)
    // {

    //    $validator = Validator::make($request->all(),[
    //         'title' => ['required','unique:menus,slug','string'],
    //         'type' =>['required','string'],
    //         'slug' => ['required'],
    //         'parent_id' => ['nullable'],
    //         'status' => ['required','string'],
    //     ]);

    //     $slug = Str::of( $request->title)->slug('-');

    //     $data = [
    //         'title' => $request->title,
    //         'slug'=> $slug,
    //         'status' => $request->status,
    //     ];

    //     Menu::create($data);
    //     return redirect()->route('menu.index')->with('success', 'Item has been Created');
    // }



    // public function menu_delete($id)
    // {
    //     Menu::find($id)->delete();
    //     return redirect()->route('menu.index')->with('error', 'Item has been Deleted ');
    // }



}
