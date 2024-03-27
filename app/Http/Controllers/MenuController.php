<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\subMenu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function menu()
    {
        $menus = menu::all();
        $sub_menus = subMenu::;
        return view('back-end.menu.index', compact('menus','sub_menus'));
    }

    public function menuCreate()
    {
        return view('back-end.menu.create');
    }



    public function menuStore(Request $request)
    {

        $data = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|unique:menus,slug|string',
            'status' => 'required|string',
        ]);

        menu::create($data);
        return redirect()->route('menu.index')->with('success', 'Menu Item Created Successfully');
    }

    public function menuDelete($id)
    {
        menu::find($id)->delete();
        return redirect()->route('menu.index')->with('error', 'Menu Item Deleted Successfully');
    }


    public function subMenuCreate()
    {
        $menus = menu::where('status', 'publish')->get();
        return view('back-end.sub_menu.create', compact('menus'));
    }

    public function subMenuStore(Request $request){

        $data = $request->validate([
            'parent_id' =>"required",
            'title' => 'required|string',
            'slug' => 'required|unique:menus,slug|string',
            'status' => 'required|string',
        ]);

        subMenu::create([
            'parent_id' => 'parent_id',
            'sub_title' => $data['title'],
            'sub_slug' => $data['slug'],
            'status' => $data['status'],
        ]);
        return redirect()->route('menu.index')->with('success', 'Menu Item Created Successfully');
    }
}
