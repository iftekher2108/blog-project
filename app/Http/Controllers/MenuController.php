<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        return response()->json(['success' => 'Menu order changed successfully']);
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

        $menu->title = $request->title;
        $menu->slug = Str::of($request->title)->slug('-');
        $menu->content = $request->content;
        $menu->keywords = $request->keywords;
        $menu->status = $request->status;
        $menu->save();

        return redirect()->route('menu.index')->with('success',$menu->title.' Items updated successfully');

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
    //     return redirect()->route('menu.index')->with('success', 'Menu Item Created Successfully');
    // }



    // public function menu_delete($id)
    // {
    //     Menu::find($id)->delete();
    //     return redirect()->route('menu.index')->with('error', 'Menu Item Deleted Successfully');
    // }



}
