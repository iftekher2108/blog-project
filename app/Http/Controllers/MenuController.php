<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{

    public function menu()
    {
        $menus = menu::orderBy('order_id','asc')->get();
        $sub_menus = DB::table('sub_menus')
            ->leftJoin('menus', 'sub_menus.men_id', '=', 'menus.id')
            ->select('menus.title as men_title', 'sub_menus.*')->orderBy('order_id','asc')->get();
        // dd($sub_menus);
        return view('back-end.menu.index', compact('menus', 'sub_menus'));
    }

    public function menuCreate()
    {
        return view('back-end.menu.create');
    }


    public function menu_order(Request $request) {
        $menu = menu::find($request->id);
        $menu->order_id = $request->input_id;
        $menu->save();
        return response()->json(['success' => 'Menu order changed successfully']);
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



}
